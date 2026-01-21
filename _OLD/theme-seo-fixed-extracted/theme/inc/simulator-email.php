<?php
/**
 * OBLINK - Email Sender for Simulator Results
 * Sends calculation results to user after email capture
 */

function send_simulator_email($email, $results, $mode, $params)
{
    $to = $email;
    $subject = '📊 Vos simulations OBLINK : ' . $results['net_formatted'] . ' dans votre poche';

    // Préparer le contenu selon le mode
    if ($mode === 'freelance') {
        $body = get_freelance_email_body($results, $params);
    } else {
        $body = get_contrat_email_body($results, $params);
    }

    // Headers
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: OBLINK <noreply@oblink.fr>',
        'Reply-To: contact@oblink.fr'
    );

    // Envoyer l'email
    $sent = wp_mail($to, $subject, $body, $headers);

    return $sent;
}

function get_freelance_email_body($results, $params)
{
    $tjm = $params['tjm'];
    $days = $params['days'];
    $net = number_format($results['net'], 0, ',', ' ');
    $diff = isset($results['diff']) ? $results['diff'] : 1500; // Fallback or calc

    // Si la différence n'est pas passée, on l'estime grossièrement pour l'email
    // (Net freelance moyen ~4000 vs Salarié moyen ~2000)

    $link_missions = home_url('/inscription-opticien');
    $link_academy = home_url('/formation-erp');

    return "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <style>
            body { font-family: 'Helvetica', Arial, sans-serif; line-height: 1.6; color: #303030; background-color: #f4f4f4; margin: 0; padding: 0; }
            .container { max-width: 600px; margin: 20px auto; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
            .header { background: linear-gradient(135deg, #FF6600 0%, #9A48D0 100%); color: white; padding: 40px 20px; text-align: center; }
            .content { padding: 40px; }
            .result-box { background: #fff5eb; border: 2px solid #FF6600; border-radius: 12px; padding: 25px; text-align: center; margin: 30px 0; }
            .big-number { font-size: 42px; font-weight: 800; color: #FF6600; margin: 10px 0; letter-spacing: -1px; }
            .btn { background: #FF6600; color: white !important; text-decoration: none; padding: 18px 35px; border-radius: 50px; display: inline-block; font-weight: bold; font-size: 18px; margin-top: 20px; box-shadow: 0 4px 10px rgba(255, 102, 0, 0.3); }
            .list-check { list-style: none; padding: 0; margin: 0; text-align: left; }
            .list-check li { padding: 10px 0; border-bottom: 1px solid #eee; display: flex; align-items: start; }
            .icon { color: #FF6600; margin-right: 10px; font-weight: bold; }
            .footer { background: #303030; color: #999; padding: 20px; text-align: center; font-size: 12px; }
            .highlight-green { color: #22c55e; font-weight: bold; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1 style='margin:0; font-size: 24px;'>Vos résultats de simulation OBLINK</h1>
            </div>
            
            <div class='content'>
                <p>Bonjour,</p>
                <p>Vous avez utilisé notre simulateur pour estimer votre potentiel en tant qu'opticien indépendant, et les chiffres parlent d'eux-mêmes.</p>
                
                <div class='result-box'>
                    <p style='margin:0; text-transform:uppercase; font-size:12px; letter-spacing:2px; font-weight:bold; color:#FF6600;'>Votre Revenu Net Estimé</p>
                    <div class='big-number'>{$net} € / mois</div>
                    <p style='margin:0; color:#666;'> Basé sur un TJM de <strong>{$tjm} €</strong></p>
                </div>

                <h3 style='text-align:center;'>🚀 Passez du calcul à la réalité</h3>
                <p>Gagner mieux sa vie est une chose, sécuriser ses missions en est une autre. Sur <strong>OBLINK</strong>, nous vous donnons les outils pour atteindre ce chiffre :</p>
                
                <ul class='list-check'>
                    <li>
                        <span class='icon'>✓</span> 
                        <div><strong>Accédez au Job Board :</strong> Plus de 15 missions ouvertes cette semaine.</div>
                    </li>
                    <li>
                        <span class='icon'>✓</span> 
                        <div><strong>Boostez votre TJM :</strong> Validez votre <a href='{$link_academy}' style='color:#9A48D0; font-weight:bold;'>Certification Logiciel</a> pour gagner ~15% de plus.</div>
                    </li>
                    <li>
                        <span class='icon'>✓</span> 
                        <div><strong>Zéro administratif :</strong> Facturation automatique et contrats sécurisés.</div>
                    </li>
                </ul>
                
                <div style='text-align:center; margin-top: 40px;'>
                    <a href='{$link_missions}' class='btn'>Compléter mon profil et voir les missions</a>
                </div>
                
                <div style='background: #f9f9f9; padding: 20px; border-radius: 8px; margin-top: 40px; border-left: 4px solid #9A48D0;'>
                    <p style='margin:0; font-style:italic; font-size: 14px;'>
                        <strong>💡 Le conseil de l'expert :</strong><br>
                        Le statut d'indépendant est la clé de votre liberté, mais la compétence est la clé de votre rentabilité. Un profil certifié est contacté 4x plus souvent.
                    </p>
                </div>
            </div>
            
            <div class='footer'>
                <p>L'équipe OBLINK - L'emploi opticien, en un clin d'œil.</p>
                <p>Ces montants sont des estimations basées sur les taux de cotisations 2026. Ils ne constituent pas une promesse d'embauche ou une garantie de revenus.</p>
            </div>
        </div>
    </body>
    </html>
    ";
}

function get_contrat_email_body($results, $params)
{
    // Fallback simple pour le mode 'contrat' si jamais utilisé
    // ... (similaire mais adapté contrat)
    return get_freelance_email_body($results, $params); // Placeholder
}
?>