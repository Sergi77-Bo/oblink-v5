# PRODUCT REQUIREMENTS DOCUMENT (PRD) - OBLINK

## 1. Global Context
* **Vertical:** Specialized Marketplace for Opticians & Optical Stores + EdTech (BTS/VAE).
* **Core Value:** Secure recruitment (Verified Profiles) & Career management for Opticians.
* **Stack:** Antigravity (Django/React), PostgreSQL, Tailwind/Shadcn.

## 2. User Roles
* **Candidate (Opticien):**
    * *Sub-types:* Student (BTS), Freelance, CDI/Employee.
    * *Goals:* Find missions, manage invoices, learn (Academy).
* **Company (Recruteur):**
    * *Sub-types:* Indépendant, Network (Krys, Afflelou).
    * *Goals:* Post jobs, Search CV-thèque (Blurred/Unblurred).
* **Admin:** Manual validation of diplomas.

## 3. PAGE & FEATURES MATRIX

### A. Espace Candidat
| Route | Feature | Tech Logic |
| :--- | :--- | :--- |
| `/candidat/onboarding` | **Validation Profil** | - Upload Diplôme/CNI (S3)<br>- Select Skills (Cosium, etc.) |
| `/candidat/dashboard` | Dashboard | - Toggle "Disponible"<br>- Stats Revenus (Freelance) |
| `/academy/chat` | **Professeur Virtuel** | - OpenAI wrapper (Context: BTS Opticien) |
| `/tools/simulateur` | Simu Salaire | - Client-side JS calc |

### B. Espace Recruteur
| Route | Feature | Tech Logic |
| :--- | :--- | :--- |
| `/recruteur/search` | **CV-thèque** | - Filter by Skills/City<br>- Blur names if Free Plan |
| `/recruteur/jobs` | Post Job | - Form w/ specific inputs (Logiciels, Verres) |

### C. Public / SEO
| Route | Feature |
| :--- | :--- |
| `/salaires-optique-2026` | Baromètre (Data Viz) |
| `/bts-opticien-annales` | SEO Magnet |

## 4. Technical Rules for Cursor
* **Backend:** Django Rest Framework (DRF).
* **Frontend:** React + Shadcn/UI components.
* **Forms:** React-hook-form + Zod schemas.
* **State:** Tanstack Query for all API calls.
* **API Security:** All endpoints protected by `IsAuthenticated` unless specified public.
