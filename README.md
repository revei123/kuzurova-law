# Kuzurova Law — WordPress prototype

Custom theme for **Кузурова Дарья Дмитриевна**, lawyer in Minsk (Belarus).

## Local run (Docker)

Requirements: [Docker Desktop](https://www.docker.com/products/docker-desktop/).

```bash
cd kuzurova-law-theme
docker compose up -d
```

Open: http://localhost:8081

First-time WordPress setup:

1. Language: Russian
2. Site title: ЯСНО / Kuzurova Law (demo)
3. Admin user / password (your choice)
4. **Settings → Permalinks** → Post name
5. **Appearance → Themes** → activate **Kuzurova Law**
6. Install plugin **Advanced Custom Fields** from admin
7. Demo content loads once on theme activation

Stop:

```bash
docker compose down
```

Theme folder is mounted from `./kuzurova-law` — edits apply immediately.

## Install (manual WordPress)

1. Install WordPress 6.4+ (PHP 8.0+).
2. Copy folder `kuzurova-law` to `wp-content/themes/`.
3. Install plugins:
   - **Advanced Custom Fields** (required for editable fields)
   - **Yoast SEO** or **Rank Math** (optional, theme already outputs basic meta/schema)
4. Activate theme **Kuzurova Law**.
5. On first activation demo content is seeded once (marked as demo).
6. **Settings → Reading**: static front page (theme creates page `home` automatically on seed).
7. **Settings → Permalinks**: Post name (ЧПУ).
8. Fill **Site settings** in admin (phone, email, contacts).

## Structure

```
kuzurova-law/
├── assets/css/main.css
├── assets/js/main.js
├── inc/                 # CPT, ACF, SEO, forms, demo seed
├── template-parts/
├── templates/           # About, Contact, Privacy
├── front-page.php
├── single-kl_*.php
└── archive.php
```

## Custom post types

| Type | URL |
|------|-----|
| Services | `/services/` |
| Cases | `/cases/` |
| Reviews | `/reviews/` |
| Articles | `/blog/` |

## Important

All experience, cases, reviews and stats are **demo** unless replaced by the site owner.
Do not publish unverified claims (e.g. “100% win rate”, “#1 lawyer”).

## Checklist before launch

- Replace demo texts, cases, reviews
- Upload real photo in About block (via page or custom field extension)
- Configure contact email in Site settings
- Privacy policy text
- Test form on `/contact/`
- Responsive: 320 / 375 / 768 / 1024 / 1440 / 1920
- Lighthouse performance + accessibility

## Reset demo seed (dev)

Delete option `kuzurova_demo_seeded` in database and switch theme again.
