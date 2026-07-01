/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./site/**/*.html"],
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        "on-background": "#1e1c11",
        "tertiary": "#714a47",
        "outline-variant": "#d6c2c0",
        "primary-fixed": "#ffdad7",
        "secondary-fixed-dim": "#ecbbb5",
        "on-tertiary": "#ffffff",
        "surface-container-highest": "#e9e2d1",
        "error": "#ba1a1a",
        "on-error-container": "#93000a",
        "primary-container": "#955e5a",
        "surface-container-lowest": "#ffffff",
        "primary": "#794643",
        "on-surface": "#1e1c11",
        "on-secondary-fixed": "#2f1411",
        "tertiary-fixed-dim": "#eebab5",
        "secondary": "#7b5550",
        "on-primary-fixed-variant": "#693936",
        "secondary-fixed": "#ffdad6",
        "warm-cream": "#EDE6D5",
        "error-container": "#ffdad6",
        "rose-dust": "#D4A39E",
        "on-primary-container": "#ffebe9",
        "surface-dim": "#e0dac9",
        "tertiary-container": "#8c625e",
        "on-secondary-container": "#7a544f",
        "on-secondary-fixed-variant": "#613e3a",
        "on-primary": "#ffffff",
        "terracotta-base": "#955E5A",
        "surface-container": "#f4eddc",
        "primary-fixed-dim": "#fab6b0",
        "tertiary-fixed": "#ffdad6",
        "surface-tint": "#85504c",
        "on-tertiary-fixed-variant": "#623d3a",
        "terracotta-deep": "#6F4A46",
        "surface-container-high": "#efe8d7",
        "outline": "#847372",
        "surface": "#fff9ed",
        "on-surface-variant": "#524342",
        "inverse-primary": "#fab6b0",
        "on-secondary": "#ffffff",
        "surface-bright": "#fff9ed",
        "inverse-surface": "#333025",
        "on-tertiary-container": "#ffebe9",
        "surface-container-low": "#faf3e2",
        "surface-variant": "#e9e2d1",
        "on-error": "#ffffff",
        "secondary-container": "#fecbc5",
        "inverse-on-surface": "#f7f0df",
        "background": "#fff9ed",
        "surface-alt": "#F5F5F5",
        "on-tertiary-fixed": "#2f1311",
        "on-primary-fixed": "#350f0e"
      },
      borderRadius: {
        DEFAULT: "0.25rem",
        lg: "0.5rem",
        xl: "0.75rem",
        "2xl": "1.5rem",
        full: "9999px"
      },
      spacing: {
        "margin-desktop": "64px",
        "margin-mobile": "16px",
        "container-max": "1280px",
        gutter: "24px",
        base: "8px"
      },
      fontFamily: {
        "label-md": ["DM Sans"],
        "body-lg": ["DM Sans"],
        "display-lg": ["Libre Caslon Text"],
        "display-lg-mobile": ["Libre Caslon Text"],
        "label-sm": ["DM Sans"],
        "headline-sm": ["Libre Caslon Text"],
        "headline-md": ["Libre Caslon Text"],
        "body-md": ["DM Sans"]
      },
      fontSize: {
        "label-md": ["14px", { lineHeight: "1.2", letterSpacing: "0.01em", fontWeight: "500" }],
        "body-lg": ["18px", { lineHeight: "1.6", fontWeight: "400" }],
        "display-lg": ["48px", { lineHeight: "1.1", letterSpacing: "-0.02em", fontWeight: "700" }],
        "display-lg-mobile": ["36px", { lineHeight: "1.2", fontWeight: "700" }],
        "label-sm": ["12px", { lineHeight: "1.2", letterSpacing: "0.04em", fontWeight: "700" }],
        "headline-sm": ["24px", { lineHeight: "1.3", fontWeight: "600" }],
        "headline-md": ["32px", { lineHeight: "1.2", fontWeight: "600" }],
        "body-md": ["16px", { lineHeight: "1.6", fontWeight: "400" }]
      }
    }
  },
  plugins: [
    require("@tailwindcss/forms"),
    require("@tailwindcss/container-queries")
  ]
};
