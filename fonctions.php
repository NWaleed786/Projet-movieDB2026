<?php
require_once("get-proxy.php");

// Clé TMDB fournie dans le projet
const TMDB_API_KEY = "9e43f45f94705cc8e1d5a0400d19a7b7";
const TMDB_BASE_URL = "https://api.themoviedb.org/3";
const TMDB_IMAGE_BASE = "https://image.tmdb.org/t/p/";

function callTmdb(string $endpoint, array $params = []): array
{
    $defaultParams = [
        'api_key' => TMDB_API_KEY,
        'language' => 'fr-FR'
    ];

    $params = array_merge($defaultParams, $params);
    $url = TMDB_BASE_URL . $endpoint . '?' . http_build_query($params);

    $response = getProxy($url);

    if ($response === false || empty($response)) {
        return [];
    }

    $result = json_decode($response, true);

    if (!is_array($result)) {
        return [];
    }

    return $result;
}

function popularMovies(): array
{
    $result = callTmdb('/movie/popular');
    return $result['results'] ?? [];
}

function topRatedMovies(): array
{
    $result = callTmdb('/movie/top_rated');
    return $result['results'] ?? [];
}

function moviesByGenre(int $genreId): array
{
    $result = callTmdb('/discover/movie', ['with_genres' => $genreId]);
    return $result['results'] ?? [];
}

function searchMovies(string $query): array
{
    $result = callTmdb('/search/movie', ['query' => $query]);
    return $result['results'] ?? [];
}

function searchActeurs(string $query): array
{
    $result = callTmdb('/search/person', ['query' => $query]);
    return $result['results'] ?? [];
}

function movieDetails(int $movieId): array
{
    return callTmdb('/movie/' . $movieId);
}

function movieCredits(int $movieId): array
{
    $result = callTmdb('/movie/' . $movieId . '/credits');
    return $result['cast'] ?? [];
}

function acteurDetails(int $acteurId): array
{
    return callTmdb('/person/' . $acteurId);
}

function acteurMovies(int $acteurId): array
{
    $result = callTmdb('/person/' . $acteurId . '/combined_credits');

    if (!isset($result['cast']) || !is_array($result['cast'])) {
        return [];
    }

    $movies = array_filter($result['cast'], function ($item) {
        return isset($item['media_type']) && $item['media_type'] === 'movie';
    });

    usort($movies, function ($a, $b) {
        return ($b['popularity'] ?? 0) <=> ($a['popularity'] ?? 0);
    });

    return array_slice($movies, 0, 12);
}

function genresList(): array
{
    return [
        28 => 'Action',
        12 => 'Aventure',
        35 => 'Comédie',
        18 => 'Drame',
        27 => 'Horreur',
        878 => 'Science-Fiction',
        53 => 'Thriller',
        37 => 'Western'
    ];
}

function getGenreName(int $genreId): string
{
    $genres = genresList();
    return $genres[$genreId] ?? 'Genre inconnu';
}

function posterUrl(?string $path, string $size = 'w500'): string
{
    if (empty($path)) {
        return 'https://via.placeholder.com/500x750?text=Pas+d%27image';
    }

    return TMDB_IMAGE_BASE . $size . $path;
}

function profileUrl(?string $path, string $size = 'w185'): string
{
    if (empty($path)) {
        return 'https://via.placeholder.com/300x450?text=Pas+d%27image';
    }

    return TMDB_IMAGE_BASE . $size . $path;
}

function formatDateFr(?string $date): string
{
    if (empty($date)) {
        return 'Date inconnue';
    }

    $timestamp = strtotime($date);
    if ($timestamp === false) {
        return 'Date inconnue';
    }

    return date('d/m/Y', $timestamp);
}

function limitText(?string $text, int $limit = 180): string
{
    $text = trim((string) $text);

    if ($text === '') {
        return 'Aucune description disponible.';
    }

    if (mb_strlen($text) <= $limit) {
        return $text;
    }

    return mb_substr($text, 0, $limit) . '...';
}
