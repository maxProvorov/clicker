# URL Shortener API

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

## API Endpoints

### Create Short Link

`POST /api/shorten`
```json
{
  "url": "https://example.com"
}
```
Response:
```json
{
  "short_url": "http://localhost/abc123",
  "code": "abc123"
}
```

### Register
`POST /api/register`
```json
{
  "name": "testname",
  "email": "test@example.com",
  "password": "password"
}
```
Response:
```json
{
  "token": "xxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
}
```
### Login
`POST /api/login`
```json
{
  "email": "test@example.com",
  "password": "password"
}
```
Response:
```json
{
  "token": "xxxxxxxxxxxxxxxxxxxxxxxxxxxxx"
}
```

### Redirect

`GET /{code}`

### Statistics (Protected)

`GET /api/statistics/{code}`  
Header: `Authorization: Bearer {token}`

Response:
```json
{
  "clicks_count": 5,
  "created_at": ""
}
```

## Rate Limiting

120 requests per minute per IP.
