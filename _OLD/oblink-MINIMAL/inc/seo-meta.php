<?php
/**
 * OBLINK - SEO Meta Tags Management
 * 
 * Centralized system for managing meta descriptions, Open Graph tags,
 * Twitter Cards, and JSON-LD structured data for all pages.
 */

/**
 * Get SEO metadata for the current page
 * 
 * @return array Associative array with title, description, og_image, etc.
 */
function oblink_get_seo_meta()
{
    $site_url = home_url();
    $default_og_image = $site_url . '/wp-content/uploads/oblink-og-image.jpg';
    $default_logo = $site_url . '/wp-content/uploads/oblink-logo.png';

    // Default meta
    $meta = [
        'title' => 'OBLINK - Un opticien en un clin d\'œil',
        'description' => 'OBLINK connecte opticiens freelances et magasins d\'optique en France. +500 opticiens actifs, missions qualifiées partout en France. Inscription gratuite.',
        'og_title' => 'OBLINK - Plateforme opticiens freelances',
        'og_description' => 'Connecte opticiens free lances et magasins d\'optique en France. +500 opticiens actifs, missions qualifiées partout en France.',
        'og_image' => $default_og_image,
        'og_url' => $site_url,
        'og_type' => 'website',
        'twitter_card' => 'summary_large_image',
        'twitter_title' => 'OBLINK - Plateforme opticiens freelances',
        'twitter_description' => 'Connecte opticiens freelances et magasins d\'optique en France. +500 opticiens actifs.',
        'twitter_image' => $site_url . '/wp-content/uploads/oblink-twitter-card.jpg',
        'canonical' => $site_url,
    ];

    // Detect current page and override meta
    if (is_front_page() || is_home()) {
        // Homepage - déjà configuré par défaut
    } elseif (is_page('pour-opticiens')) {
        $meta['title'] = 'Pour Opticiens Freelance | OBLINK';
        $meta['description'] = 'Devenez opticien freelance avec OBLINK. Accédez à des missions qualifiées partout en France, portage salarial et accompagnement complet. Créez votre profil gratuit.';
        $meta['og_title'] = 'Pour Opticiens Freelance | OBLINK';
        $meta['canonical'] = home_url('/pour-opticiens');
    } elseif (is_page('pour-entreprises')) {
        $meta['title'] = 'Pour Entreprises | Recrutez des Opticiens | OBLINK';
        $meta['description'] = 'Recrutez des opticiens freelances qualifiés en 48h avec OBLINK. Profils pré-validés, économies jusqu\'à 40%. +200 magasins partenaires nous font confiance.';
        $meta['og_title'] = 'Recrutez des opticiens qualifiés | OBLINK';
        $meta['canonical'] = home_url('/pour-entreprises');
    } elseif (is_page('emploi-opticien')) {
        $meta['title'] = 'Emploi Opticien Freelance | Missions en France | OBLINK';
        $meta['description'] = 'Trouvez votre prochaine mission d\'opticien freelance. Offres de remplacement et missions ponctuelles dans toute la France. Postulez en ligne gratuitement.';
        $meta['og_title'] = 'Missions Opticien Freelance | OBLINK';
        $meta['canonical'] = home_url('/emploi-opticien');
    } elseif (is_page('blog')) {
        $meta['title'] = 'Blog Opticien Indépendant | Conseils & Guides | OBLINK';
        $meta['description'] = 'Conseils, guides pratiques et actualités pour opticiens indépendants. Gestion, facturation, témoignages et réglementation. Blog OBLINK.';
        $meta['og_title'] = 'Blog OBLINK | Conseils pour Opticiens';
        $meta['canonical'] = home_url('/blog');
    } elseif (is_page('simulateur')) {
        $meta['title'] = 'Simulateur Revenus Opticien Freelance | OBLINK';
        $meta['description'] = 'Calculez votre revenu net d\'opticien freelance. Simulateur gratuit incluant charges sociales, congés et frais professionnels. Résultat instantané.';
        $meta['og_title'] = 'Simulateur Revenus | OBLINK';
        $meta['canonical'] = home_url('/simulateur');
    } elseif (is_page('abonnements')) {
        $meta['title'] = 'Tarifs & Abonnements | Pour Magasins d\'Optique | OBLINK';
        $meta['description'] = 'Tarifs transparents pour magasins d\'optique : Découverte 0€, Premium 49€/mois, Corporate sur-mesure. Sans engagement, annulable à tout moment.';
        $meta['og_title'] = 'Tarifs OBLINK | Pour Entreprises';
        $meta['canonical'] = home_url('/abonnements');
    } elseif (is_page('a-propos')) {
        $meta['title'] = 'À Propos | Notre Mission | OBLINK';
        $meta['description'] = 'OBLINK, la première plateforme de mise en relation pour opticiens freelances et magasins d\'optique en France. Mission, valeurs et équipe.';
        $meta['og_title'] = 'À Propos d\'OBLINK';
        $meta['canonical'] = home_url('/a-propos');
    } elseif (is_page('inscription-opticien')) {
        $meta['title'] = 'Inscription Opticien Freelance | Créez Votre Profil | OBLINK';
        $meta['description'] = 'Créez votre profil d\'opticien freelance gratuitement. Accédez aux meilleures missions partout en France. Inscription en 3 minutes.';
        $meta['og_title'] = 'Rejoignez OBLINK | Opticiens';
        $meta['canonical'] = home_url('/inscription-opticien');
    } elseif (is_page('inscription-entreprise')) {
        $meta['title'] = 'Inscription Entreprise | Recrutez des Opticiens | OBLINK';
        $meta['description'] = 'Inscrivez votre magasin d\'optique et accédez à des centaines d\'opticiens qualifiés. Inscription gratuite sans engagement.';
        $meta['og_title'] = 'Rejoignez OBLINK | Entreprises';
        $meta['canonical'] = home_url('/inscription-entreprise');
    } elseif (is_page('opticien-freelance-paris')) {
        $meta['title'] = 'Opticien Freelance Paris | Missions & Emplois Optique 75 | OBLINK';
        $meta['description'] = 'Opticien freelance à Paris : trouvez des missions qualifiées dans les 20 arrondissements. +450 magasins partenaires. Inscription gratuite OBLINK.';
        $meta['og_title'] = 'Missions Opticien Freelance Paris | OBLINK';
        $meta['og_description'] = 'Trouvez des missions d\'opticien à Paris. 450+ magasins, taux 280-350€/jour. Inscription gratuite.';
        $meta['canonical'] = home_url('/opticien-freelance-paris');
    } elseif (is_page('opticien-freelance-lyon')) {
        $meta['title'] = 'Opticien Freelance Lyon | Missions Rhône (69) | OBLINK';
        $meta['description'] = 'Missions opticien freelance à Lyon. 200+ magasins partenaires. Taux journalier attractif. Inscription gratuite OBLINK.';
        $meta['og_title'] = 'Missions Opticien Lyon | OBLINK';
        $meta['canonical'] = home_url('/opticien-freelance-lyon');
    } elseif (is_page('opticien-freelance-marseille')) {
        $meta['title'] = 'Opticien Freelance Marseille | Missions Bouches-du-Rhône | OBLINK';
        $meta['description'] = 'Trouvez des missions d\'opticien freelance à Marseille et PACA. 150+ magasins partenaires. Inscription gratuite.';
        $meta['og_title'] = 'Missions Opticien Marseille | OBLINK';
        $meta['canonical'] = home_url('/opticien-freelance-marseille');
    } elseif (is_page('comment-ca-marche')) {
        $meta['title'] = 'Comment ça marche ? | Le Process OBLINK';
        $meta['description'] = 'Découvrez comment OBLINK connecte opticiens et magasins en 3 étapes simples : inscription, validation et matching. Simple, rapide, efficace.';
        $meta['og_title'] = 'Comment ça marche | OBLINK';
        $meta['canonical'] = home_url('/comment-ca-marche');
    } elseif (is_page('mentions-legales')) {
        $meta['title'] = 'Mentions Légales | OBLINK';
        $meta['description'] = 'Mentions légales du site OBLINK : éditeur, hébergeur, directeur de publication et informations légales.';
        $meta['og_title'] = 'Mentions Légales | OBLINK';
        $meta['canonical'] = home_url('/mentions-legales');
    } elseif (is_page('cgu')) {
        $meta['title'] = 'CGU & CGV | Conditions Générales | OBLINK';
        $meta['description'] = 'Conditions générales d\'utilisation et de vente de la plateforme OBLINK pour opticiens freelances et magasins d\'optique. Juridique, tarifs, responsabilités.';
        $meta['og_title'] = 'Conditions Générales | OBLINK';
        $meta['canonical'] = home_url('/cgu');
    } elseif (is_single()) {
        // Blog single article
        global $post;
        $meta['title'] = get_the_title() . ' | OBLINK Blog';
        $meta['description'] = get_the_excerpt() ?: wp_trim_words(get_the_content(), 30);
        $meta['og_title'] = get_the_title();
        $meta['og_type'] = 'article';
        $meta['canonical'] = get_permalink();

        if (has_post_thumbnail()) {
            $meta['og_image'] = get_the_post_thumbnail_url(null, 'large');
            $meta['twitter_image'] = get_the_post_thumbnail_url(null, 'large');
        }
    }

    // Synchronize Twitter with OG
    $meta['twitter_title'] = $meta['og_title'];
    $meta['twitter_description'] = $meta['og_description'];

    return apply_filters('oblink_seo_meta', $meta);
}

/**
 * Output SEO meta tags in <head>
 */
function oblink_output_seo_meta()
{
    $meta = oblink_get_seo_meta();
    ?>
    <!-- SEO Meta Tags -->
    <title>
        <?php echo esc_html($meta['title']); ?>
    </title>
    <meta name="description" content="<?php echo esc_attr($meta['description']); ?>">
    <link rel="canonical" href="<?php echo esc_url($meta['canonical']); ?>">

    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo esc_attr($meta['og_title']); ?>">
    <meta property="og:description" content="<?php echo esc_attr($meta['og_description']); ?>">
    <meta property="og:image" content="<?php echo esc_url($meta['og_image']); ?>">
    <meta property="og:url" content="<?php echo esc_url($meta['canonical']); ?>">
    <meta property="og:type" content="<?php echo esc_attr($meta['og_type']); ?>">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:site_name" content="OBLINK">

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="<?php echo esc_attr($meta['twitter_card']); ?>">
    <meta name="twitter:title" content="<?php echo esc_attr($meta['twitter_title']); ?>">
    <meta name="twitter:description" content="<?php echo esc_attr($meta['twitter_description']); ?>">
    <meta name="twitter:image" content="<?php echo esc_url($meta['twitter_image']); ?>">
    <?php
}

/**
 * Output JSON-LD Structured Data
 */
function oblink_output_json_ld()
{
    $site_url = home_url();
    $schemas = [];

    // Organization Schema (Global)
    $schemas[] = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => 'OBLINK',
        'url' => $site_url,
        'logo' => $site_url . '/wp-content/uploads/oblink-logo.png',
        'description' => 'Plateforme de mise en relation entre opticiens freelances et magasins d\'optique en France',
        'email' => 'contact@oblink.fr',
        'areaServed' => [
            '@type' => 'Country',
            'name' => 'France'
        ],
        'sameAs' => [
            'https://www.linkedin.com/company/oblink',
            'https://www.facebook.com/oblink',
            'https://www.instagram.com/oblink'
        ],
        'aggregateRating' => [
            '@type' => 'AggregateRating',
            'ratingValue' => '4.9',
            'reviewCount' => '180'
        ]
    ];

    // Page-specific schemas
    if (is_page('emploi-opticien')) {
        // JobPosting Schema
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'JobPosting',
            'title' => 'Missions Opticien Freelance',
            'description' => 'Trouvez des missions d\'opticien freelance partout en France via OBLINK',
            'datePosted' => current_time('Y-m-d'),
            'employmentType' => 'CONTRACTOR',
            'hiringOrganization' => [
                '@type' => 'Organization',
                'name' => 'OBLINK',
                'sameAs' => $site_url
            ],
            'jobLocation' => [
                '@type' => 'Place',
                'address' => [
                    '@type' => 'PostalAddress',
                    'addressCountry' => 'FR'
                ]
            ],
            'baseSalary' => [
                '@type' => 'MonetaryAmount',
                'currency' => 'EUR',
                'value' => [
                    '@type' => 'QuantitativeValue',
                    'value' => 280,
                    'unitText' => 'DAY'
                ]
            ]
        ];
    }

    // FAQ Schema for Comment ça marche page
    if (is_page('comment-ca-marche')) {
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'Comment m\'inscrire sur OBLINK en tant qu\'opticien ?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'L\'inscription est 100% gratuite. Créez votre profil en 3 minutes, ajoutez votre CV et diplômes, puis notre équipe valide  votre dossier sous 48h. Vous recevez ensuite des propositions de missions directement.'
                    ]
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Combien coûte OBLINK pour les magasins ?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'OBLINK propose 3 formules : Découverte à 0€ (1 offre/mois), Premium à 49€/mois (offres illimitées + support prioritaire), et Corporate sur-mesure. Sans engagement, annulable à tout moment.'
                    ]
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Quel est le délai pour trouver un opticien ?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'En moyenne, nos magasins partenaires reçoivent les premières candidatures sous 48h. 85% des offres sont pourvues en moins de 7 jours grâce à notre réseau de +500 opticiens actifs.'
                    ]
                ]
            ]
        ];
    }

    // FAQ Schema for Pour Opticiens page
    if (is_page('pour-opticiens')) {
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'Quel est le taux journalier moyen pour un opticien freelance ?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Le taux journalier varie de 250€ à 350€ selon la région, l\'expérience et le type de mission. À Paris, la moyenne est de 280-320€/jour. Sur OBLINK, vous négociez directement vos tarifs avec les magasins.'
                    ]
                ],
                [
                    '@type' => 'Question',
                    'name' => 'OBLINK propose-t-il du portage salarial ?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Oui, OBLINK est partenaire avec plusieurs sociétés de portage salarial. Vous pouvez travailler en freelance tout en bénéficiant du statut salarié : assurance chômage, retraite, mutuelle et RC Pro incluses.'
                    ]
                ]
            ]
        ];
    }

    // FAQ Schema for Pour Entreprises page
    if (is_page('pour-entreprises')) {
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'Combien coûte le recrutement d\'un opticien via OBLINK ?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'OBLINK propose 3 formules : Découverte à 0€ (1 offre/mois), Premium à 49€/mois (offres illimitées), et Corporate sur-mesure. Sans engagement, annulable à tout moment.'
                    ]
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Quel est le délai moyen pour recruter un opticien ?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => '85% des offres reçoivent des candidatures sous 48h. Le délai moyen pour pourvoir un poste est de 7 jours grâce à notre réseau de +500 opticiens actifs.'
                    ]
                ]
            ]
        ];
    }

    // FAQ Schema for Abonnements page
    if (is_page('abonnements')) {
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'Puis-je annuler mon abonnement à tout moment ?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Oui, tous nos abonnements sont sans engagement. Vous pouvez annuler à tout moment depuis votre espace client, sans frais ni pénalités.'
                    ]
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Quelle différence entre Premium et Corporate ?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Premium (49€/mois) convient aux magasins indépendants avec offres illimitées. Corporate propose des fonctionnalités avancées pour groupes (multi-magasins, reporting, API), tarif sur-mesure.'
                    ]
                ]
            ]
        ];
    }

    // FAQ Schema for Pass Examen page
    if (is_page('pass-examen')) {
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'Le Pass Examen garantit-il la réussite au BTS OL ?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Le Pass Examen est un outil d\'accompagnement pédagogique. Nous ne pouvons garantir la réussite aux examens, qui dépend de votre travail personnel et de votre assimilation des connaissances.'
                    ]
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Combien de quiz sont disponibles ?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Le Pass Examen contient plus de 2 000 questions réparties sur les 6 matières du BTS Opticien-Lunetier, avec des annales de 2000 à 2025 et un générateur IA de questions illimitées.'
                    ]
                ]
            ]
        ];
    }

    // FAQ Schema for Pass VAE page
    if (is_page('pass-vae')) {
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'Quelle est la durée d\'une VAE Opticien-Lunetier ?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Une VAE dure en moyenne 8 à 12 mois, selon votre rythme de travail. Le Pass VAE OBLINK vous accompagne sur toute la durée avec des outils d\'aide à la rédaction et de préparation au jury.'
                    ]
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Le Pass VAE est-il éligible au CPF ?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Le Pass VAE n\'est pas encore certifié CPF. Contactez-nous pour connaître les solutions de financement alternatives (OPCO, Pôle Emploi, financement personnel).'
                    ]
                ]
            ]
        ];
    }

    // FAQ Schema for Simulateur page
    if (is_page('simulateur')) {
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'Le simulateur de revenus est-il fiable ?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Oui, notre simulateur utilise les taux de charges sociales officiels 2026 (URSSAF). Les résultats sont indicatifs et peuvent varier selon votre situation personnelle. Consultez un expert-comptable pour un bilan précis.'
                    ]
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Quelle différence entre auto-entrepreneur et portage salarial ?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Auto-entrepreneur : charges ~22%, pas de chômage, gestion simplifiée. Portage salarial : charges ~50%, chômage, retraite, RC Pro incluse, statut salarié. Le simulateur compare les deux statuts.'
                    ]
                ]
            ]
        ];
    }

    // FAQ Schema for Emploi Opticien page
    if (is_page('emploi-opticien')) {
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => 'Comment postuler à une offre sur OBLINK ?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Créez votre profil gratuit en 3 minutes, uploadez votre CV et diplômes. Notre équipe valide votre dossier sous 48h. Vous pouvez ensuite postuler aux offres en 1 clic.'
                    ]
                ],
                [
                    '@type' => 'Question',
                    'name' => 'Y a-t-il des offres partout en France ?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => 'Oui, OBLINK recense des missions dans toute la France : Paris, Lyon, Marseille, Bordeaux, Toulouse, Nantes, et 200+ villes. Filtrez par département ou ville dans la recherche.'
                    ]
                ]
            ]
        ];
    }

    // AggregateRating Schema for Homepage (star ratings in Google)
    if (is_front_page() || is_home()) {
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => 'OBLINK - Plateforme Opticiens Freelances',
            'url' => home_url(),
            'description' => 'Plateforme de mise en relation entre opticiens freelances et magasins d\'optique en France',
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => '4.9',
                'ratingCount' => '187',
                'bestRating' => '5',
                'worstRating' => '1'
            ],
            'provider' => [
                '@type' => 'Organization',
                'name' => 'OBLINK'
            ]
        ];
    }


    // Breadcrumb Schema (for all pages except homepage)
    if (!is_front_page() && !is_home()) {
        $breadcrumbs = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => []
        ];

        // Always start with homepage
        $breadcrumbs['itemListElement'][] = [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Accueil',
            'item' => home_url('/')
        ];

        // Add current page
        $position = 2;
        if (is_single()) {
            // Blog post breadcrumb
            $breadcrumbs['itemListElement'][] = [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Blog',
                'item' => home_url('/blog')
            ];
            $breadcrumbs['itemListElement'][] = [
                '@type' => 'ListItem',
                'position' => 3,
                'name' => get_the_title(),
                'item' => get_permalink()
            ];
        } elseif (is_page()) {
            global $post;
            $breadcrumbs['itemListElement'][] = [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => get_the_title(),
                'item' => get_permalink()
            ];
        }

        $schemas[] = $breadcrumbs;
    }

    // Output all schemas
    foreach ($schemas as $schema) {
        echo '<script type="application/ld+json">' . "\n";
        echo wp_json_encode($schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";
        echo '</script>' . "\n";
    }
}
?>