# AGENTS.md

This repository is a set of **Stitch-exported static HTML mockups** for the *Escuela Almatriz* website (Spanish-language site for a humanized-birth / doula-training school). There is no build system, package manager, git history, tests, or lint config. Each page is a self-contained `code.html` openable directly in a browser.

## Layout

`stitch_escuela_almatriz/<page>/` — one folder per page mockup, each containing:
- `code.html` — the full page. Tailwind is loaded via CDN (`https://cdn.tailwindcss.com?plugins=forms,container-queries`) with an inlined `tailwind.config` script that defines the brand palette. No local deps.
- `screen.png` — preview screenshot of that page.

`stitch_escuela_almatriz/humanist_perinatal_system/DESIGN.md` — **the design system, source of truth.** YAML front-matter defines the full Material-style color palette, typography scale, radii, and spacing; the prose documents brand intent, component rules (buttons/cards/inputs/chips/nav), and elevation/shape language. Read this before editing any page.

## Page list

- `almatriz_inicio_tipograf_a_cocomat_futura` — home / landing
- `almatriz_formaci_n_de_doulas_2026` — doula training 2026
- `almatriz_formaci_n_doula_de_menopausia_escritorio_men_restaurado` — menopause-doula training (desktop, restored menu)
- `almatriz_cursos_de_especializaci_n_escritorio` — specialization courses (desktop)
- `almatriz_sobre_nosotras_escritorio_final` — about us (desktop, final)
- `almatriz_contacto_escritorio` — contact (desktop)

Folder-name suffixes are page variants, not throwaway: `_escritorio` = desktop layout, `_final` = approved version, `_men_restaurado` = restored-menu iteration. Accents were stripped by the export tool (e.g. `tipograf_a` = "tipografía", `formaci_n` = "formación", `especializaci_n` = "especialización").

## Working with the mockups

- **Canonical fonts:** Libre Caslon Text (headlines) + DM Sans (body), as specified in `DESIGN.md`. The home mockup (`almatriz_inicio_tipograf_a_cocomat_futura`) is outdated — it loads Montserrat + Inter instead. When editing any page, align to the Libre Caslon + DM Sans pairing from `DESIGN.md`; add `Material Symbols Outlined` for icons (every page already does).
- **Fixed canvas dimensions:** each `<html>` tag carries inline `width`/`height`/`overflow:hidden` (e.g. `width:1339px; height:5485px`) sized for the screenshot export. These are *desktop mockups pinned to one resolution*, not responsive production pages. To work on responsive behavior you must remove those inline `<html>` styles first.
- **Colors:** copy hex values from the `tailwind.config` block in an existing page or from `DESIGN.md`, don't invent new ones. Key tokens: primary/terracotta-base `#955E5A` (actions), terracotta-deep `#6F4A46` (high-contrast text/borders), rose-dust `#D4A39E` (soft accents), warm-cream `#EDE6D5` / surface `#fff9ed` (backgrounds, never pure white).
- **Component conventions** (from `DESIGN.md`): primary button = terracotta `#955E5A` text white, `rounded-lg`; card = `rounded-2xl` (24px), no border, soft tinted shadow `rgba(149,94,90,0.08)`; input bg `#F5F5F5` with 1px border darkening on focus; chips are pill-shaped, low-saturation; nav is sticky with glassmorphism blur 8–12px.
- **Content language is Spanish** (es). Don't translate copy when editing.

## Deployable site

`site/` — production-ready export created from the mockups. This is the folder to upload to cPanel or commit as the live site. It contains:

- Clean filenames: `index.html`, `formacion-doulas-perinatal.html`, `formacion-doula-menopausia.html`, `cursos-especializacion.html`, `sobre-nosotras.html`, `contacto.html`.
- A shared navigation and footer inlined on every page (reference snippets live in `site/components/`).
- Real internal links between pages (the mockups use `href="#"` everywhere).
- Fixed home-page fonts (Libre Caslon Text + DM Sans) and removed the fixed-pixel canvas locks from `<html>`.
- Basic `<meta name="description">` tags added to every page.
- Open Graph / Twitter Card meta tags and JSON-LD `Organization` schema added to every page.
- `sitemap.xml`, `robots.txt`, and `.htaccess` (Apache/cPanel) present in `site/`.
- Self-hosted image assets in `site/images/` (downloaded from the Stitch project via MCP). All HTML `src` attributes now point to local files; no external Google-hosted image URLs remain in the deployable pages.
- Team portraits that returned HTTP 403 from Stitch are replaced with `images/placeholder-person.svg`; update these when official assets are available. A new `Tania.jpeg` has already been wired into `sobre-nosotras.html`.
- Contact form uses a `mailto:` action that opens the visitor's email client pre-filled with `contactoalmatriz@gmail.com`; replace with a real backend endpoint if you prefer server-side form handling.
- WhatsApp link uses `https://wa.me/56956796671`.
- Training dossiers live in `site/assets/` (`dossier-2027-perinatal.pdf`, `dossier-umbral-26-climaterio.pdf`) and are linked from the perinatal and climaterio training pages for direct download.
- SEO URLs use the domain `https://escuela-almatriz.com`; update `sitemap.xml`, `robots.txt`, `.htaccess`, and OG/JSON-LD URLs if the domain changes.

Tailwind runs as a local build (no CDN). The theme lives in `tailwind.config.js`; CSS is compiled from `src/input.css` to `site/assets/tailwind.css`, which the HTML pages load via `<link rel="stylesheet" href="/assets/tailwind.css">`. IMPORTANT: Tailwind purges unused classes, so after editing any HTML class names you must rebuild before deploying — run `pnpm install` (once) then `pnpm run build:css` (or `pnpm run watch:css` while developing). The compiled `site/assets/tailwind.css` is committed to the repo because the cPanel Git deploy only copies files and does not run a build step.

When updating the live site, edit the files in `site/`; treat `stitch_escuela_almatriz/` as read-only source/reference.

## Verification

There is nothing to compile or test. To check a change, open the relevant `code.html` in a browser (or use the page's `screen.png` as the intended-appearance reference). No CLI commands are defined.