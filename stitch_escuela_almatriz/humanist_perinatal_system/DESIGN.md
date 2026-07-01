---
name: Humanist Perinatal System
colors:
  surface: '#fff9ed'
  surface-dim: '#e0dac9'
  surface-bright: '#fff9ed'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#faf3e2'
  surface-container: '#f4eddc'
  surface-container-high: '#efe8d7'
  surface-container-highest: '#e9e2d1'
  on-surface: '#1e1c11'
  on-surface-variant: '#524342'
  inverse-surface: '#333025'
  inverse-on-surface: '#f7f0df'
  outline: '#847372'
  outline-variant: '#d6c2c0'
  surface-tint: '#85504c'
  primary: '#794643'
  on-primary: '#ffffff'
  primary-container: '#955e5a'
  on-primary-container: '#ffebe9'
  inverse-primary: '#fab6b0'
  secondary: '#7b5550'
  on-secondary: '#ffffff'
  secondary-container: '#fecbc5'
  on-secondary-container: '#7a544f'
  tertiary: '#714a47'
  on-tertiary: '#ffffff'
  tertiary-container: '#8c625e'
  on-tertiary-container: '#ffebe9'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#ffdad7'
  primary-fixed-dim: '#fab6b0'
  on-primary-fixed: '#350f0e'
  on-primary-fixed-variant: '#693936'
  secondary-fixed: '#ffdad6'
  secondary-fixed-dim: '#ecbbb5'
  on-secondary-fixed: '#2f1411'
  on-secondary-fixed-variant: '#613e3a'
  tertiary-fixed: '#ffdad6'
  tertiary-fixed-dim: '#eebab5'
  on-tertiary-fixed: '#2f1311'
  on-tertiary-fixed-variant: '#623d3a'
  background: '#fff9ed'
  on-background: '#1e1c11'
  surface-variant: '#e9e2d1'
  terracotta-deep: '#6F4A46'
  terracotta-base: '#955E5A'
  warm-cream: '#EDE6D5'
  surface-alt: '#F5F5F5'
  rose-dust: '#D4A39E'
typography:
  display-lg:
    fontFamily: Libre Caslon Text
    fontSize: 48px
    fontWeight: '700'
    lineHeight: '1.1'
    letterSpacing: -0.02em
  display-lg-mobile:
    fontFamily: Libre Caslon Text
    fontSize: 36px
    fontWeight: '700'
    lineHeight: '1.2'
  headline-md:
    fontFamily: Libre Caslon Text
    fontSize: 32px
    fontWeight: '600'
    lineHeight: '1.2'
  headline-sm:
    fontFamily: Libre Caslon Text
    fontSize: 24px
    fontWeight: '600'
    lineHeight: '1.3'
  body-lg:
    fontFamily: DM Sans
    fontSize: 18px
    fontWeight: '400'
    lineHeight: '1.6'
  body-md:
    fontFamily: DM Sans
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.6'
  label-md:
    fontFamily: DM Sans
    fontSize: 14px
    fontWeight: '500'
    lineHeight: '1.2'
    letterSpacing: 0.01em
  label-sm:
    fontFamily: DM Sans
    fontSize: 12px
    fontWeight: '700'
    lineHeight: '1.2'
    letterSpacing: 0.04em
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  base: 8px
  container-max: 1280px
  gutter: 24px
  margin-mobile: 16px
  margin-desktop: 64px
---

## Brand & Style
The design system is rooted in the philosophy of humanized birth, female empowerment, and the intersection of traditional wisdom with scientific professionalism. The brand personality is empathetic, authoritative, and inclusive.

The aesthetic follows a **Modern Humanist** style:
- **Minimalism with Warmth:** Utilizing generous whitespace to create a sense of calm and clarity during the intense journey of perinatal care.
- **Tactile Softness:** Incorporating soft gradients and subtle textures that mimic organic materials.
- **Professional Grounding:** Balancing the "softness" of the subject matter with structured layouts that signal 10 years of institutional expertise and human rights advocacy.
- **Emotional Response:** The UI should feel like a "safe space"—inviting, reliable, and deeply respectful of the female experience.

## Colors
The palette is inspired by earth tones and skin shades, emphasizing human connection. 

- **Primary (Terracotta Base):** Used for primary actions and brand signifiers. It has been refined for WCAG AA compliance against cream backgrounds.
- **Secondary (Terracotta Deep):** Reserved for high-contrast text, borders, and deep accents to provide a sense of stability.
- **Tertiary (Rose Dust):** A softer accent used for highlights, icons, and supportive UI elements.
- **Neutral (Warm Cream):** The primary surface color, replacing pure white to reduce eye strain and create a more organic, welcoming atmosphere.
- **Functional Neutrals:** Use #F5F5F5 for secondary surface tiers to maintain a clean, modern edge.

## Typography
The typography strategy creates a dialogue between tradition and science.

- **Headlines (Libre Caslon Text):** This serif font conveys the "alma" (soul) of the brand—heritage, warmth, and literary sophistication. Use for all page titles and section headers.
- **Body & UI (DM Sans):** A clean, geometric sans-serif that provides clarity and a modern, scientific feel for educational content and form-heavy interfaces.
- **Hierarchy:** Maintain high contrast between serif titles and sans-serif descriptions. Use increased line height (1.6) for body text to ensure maximum readability for tired eyes or stressful situations.

## Layout & Spacing
The layout uses a **Fixed Grid** approach for desktop to maintain a controlled, editorial feel, transitioning to a fluid model for mobile devices.

- **Grid:** 12-column grid on desktop, 4-column on mobile.
- **Rhythm:** An 8px base unit drives all spacing. Use "Generous Padding" (at least 80px-120px) between major vertical sections to allow the content to breathe.
- **Mobile Reflow:** Elements should stack vertically on mobile with increased margins to prevent accidental taps on small touch targets.

## Elevation & Depth
Depth is conveyed through **Tonal Layers** and **Ambient Shadows** rather than sharp borders.

- **Surface Strategy:** Use the primary neutral (Warm Cream) as the base. Higher-level elements (like cards) sit on pure white or the lightest "surface-alt" tint.
- **Shadows:** Use extremely soft, diffused shadows with a slight tint of the primary terracotta color (e.g., `rgba(149, 94, 90, 0.08)`) to avoid the "dirty" look of pure gray shadows.
- **Blurs:** Use subtle backdrop blurs (8px-12px) on navigation bars to maintain context of the underlying photography while ensuring readability.

## Shapes
The shape language is defined by significant curvature, avoiding sharp angles to reflect the "humanized" and "natural" aspects of the brand.

- **Standard Radius:** 16px (rounded-lg) for buttons and inputs.
- **Card Radius:** 24px (rounded-2xl) for containers, creating a "pillowy" and welcoming feel.
- **Iconography:** Use rounded terminals and open paths. Avoid jagged or aggressive shapes.

## Components
- **Buttons:** Large, rounded corners (rounded-lg). Primary buttons use the Terracotta Base with white text. Ghost buttons use a medium-weight border in Terracotta Base.
- **Cards:** Use the 24px corner radius. Cards should have no borders; depth is created via a very soft, tinted ambient shadow.
- **Input Fields:** Soft cream background (#F5F5F5) with a 1px border that darkens on focus. Use DM Sans for labels to emphasize professionalism.
- **Chips:** Highly rounded (pill-shaped) with low-saturation backgrounds for categorizing training types (e.g., "Postpartum," "Human Rights").
- **Lists:** Use custom bullet points (like a small organic dot or leaf-inspired shape) in the Primary color to reinforce the natural theme.
- **Navigation:** A sticky top bar with a glassmorphism effect, allowing the warm background imagery to bleed through subtly.