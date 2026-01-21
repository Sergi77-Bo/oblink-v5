<?php
/*
Template Name: OBLINK Certificate Verification
*/

// Security: Retrieve Param from URL
$cert_id = get_query_var('cert_id', 'CERT-OB-2026-88X42'); // Fallback for demo
$student_name = "Thomas R."; // Mock data for V1
$score = 92;
$date = date('d/m/Y', strtotime('-2 days'));

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow"> <!-- SEO Request -->
    <title>Vérification Certificat - <?php echo $cert_id; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col">

    <!-- 1. Header Banner -->
    <div class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-3xl mx-auto px-4 py-4 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div
                    class="w-8 h-8 rounded-lg bg-gradient-to-br from-orange-500 to-blue-600 flex items-center justify-center text-white font-bold text-xs">
                    OB</div>
                <span class="font-bold text-gray-900 tracking-tight">OBLINK <span
                        class="text-gray-400 font-normal">Check</span></span>
            </div>
            <div
                class="flex items-center gap-2 bg-green-50 text-green-700 px-3 py-1 rounded-full text-xs font-bold border border-green-100">
                <i class="fas fa-check-circle"></i> PROFIL VÉRIFIÉ
            </div>
        </div>
    </div>

    <main class="flex-grow p-4 md:p-8">
        <div class="max-w-2xl mx-auto space-y-6">

            <!-- 2. Certificate Status Card -->
            <div class="bg-white rounded-2xl shadow-sm border border-green-200 overflow-hidden relative">
                <div class="h-2 bg-gradient-to-r from-green-500 to-teal-500 w-full"></div>
                <div class="p-6 md:p-8 text-center">
                    <div
                        class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-4xl mx-auto mb-4 border-4 border-white shadow-sm ring-4 ring-green-50">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h1 class="text-2xl md:text-3xl font-black text-gray-900 mb-2">Statut Expert Confirmé</h1>
                    <p class="text-gray-500 font-mono text-sm bg-gray-100 inline-block px-3 py-1 rounded mb-4">ADELI: 75
                        92 **** 4</p>
                    <p class="text-gray-600 text-sm">Ce professionnel a passé avec succès notre protocole de
                        vérification hybride.</p>
                </div>
            </div>

            <!-- 3. Candidate Identity & Protocols -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
                <div class="flex flex-col md:flex-row items-center gap-6 mb-8 text-center md:text-left">
                    <div class="relative">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Candidate"
                            class="w-24 h-24 rounded-full border-4 border-white shadow-lg">
                        <div class="absolute bottom-0 right-0 w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm border-2 border-white shadow-sm"
                            title="Identité Vérifiée">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900"><?php echo $student_name; ?></h2>
                        <div class="flex flex-wrap gap-2 justify-center md:justify-start mt-2">
                            <span
                                class="inline-flex items-center bg-blue-50 text-blue-700 text-xs font-bold px-2 py-1 rounded border border-blue-100">
                                <i class="fas fa-file-medical mr-1"></i> ADELI Vérifié
                            </span>
                            <span
                                class="inline-flex items-center bg-purple-50 text-purple-700 text-xs font-bold px-2 py-1 rounded border border-purple-100">
                                <i class="fab fa-stripe mr-1"></i> ID Stripe (KYC)
                            </span>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-100 pt-6">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">Protocole de Sécurité
                        Hybride</h3>
                    <div class="grid gap-4">
                        <!-- Step 1 -->
                        <div class="flex items-start gap-4">
                            <div
                                class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center shrink-0 mt-1">
                                <i class="fas fa-check font-bold text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm">Vérification Légale (ADELI)</h4>
                                <p class="text-xs text-gray-500">Numéro ADELI correspondant à l'identité, validé auprès
                                    de l'Annuaire Santé National.</p>
                            </div>
                        </div>
                        <!-- Step 2 -->
                        <div class="flex items-start gap-4">
                            <div
                                class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center shrink-0 mt-1">
                                <i class="fas fa-check font-bold text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm">Vérification d'Identité Bancaire (KYC)</h4>
                                <p class="text-xs text-gray-500">Identité physique validée par Stripe Connect
                                    (Partenaire Paiement Sécurisé).</p>
                            </div>
                        </div>
                        <!-- Step 3 -->
                        <div class="flex items-start gap-4">
                            <div
                                class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center shrink-0 mt-1">
                                <i class="fas fa-check font-bold text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 text-sm">Validation Technique (Académie OBLINK)</h4>
                                <p class="text-xs text-gray-500">Score de <?php echo $score; ?>% obtenu sur le module
                                    "Cosium Expert" le <?php echo $date; ?>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. Recruiter CTA -->
            <div
                class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl shadow-xl p-6 md:p-8 text-white relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="font-bold text-xl mb-2">Profil Sécurisé & Validé</h3>
                    <p class="text-gray-300 text-sm mb-6">Avec OBLINK, vous ne recrutez pas seulement un CV, mais une
                        compétence technique vérifiée et une identité certifiée.</p>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <button
                            class="bg-oblink-orange hover:bg-orange-600 text-white font-bold py-3 px-6 rounded-lg transition shadow-lg flex-1 text-center bg-orange-500">
                            <i class="fas fa-handshake mr-2"></i> Proposer une mission
                        </button>
                    </div>
                </div>
                <!-- Decor -->
                <div
                    class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full blur-3xl -mr-16 -mt-16 pointer-events-none">
                </div>
            </div>

            <!-- Conditions Section (New) -->
            <div class="text-center">
                <a href="#" class="text-xs text-gray-400 hover:text-gray-600 underline">Voir les conditions d'accès au
                    statut Expert</a>
            </div>

        </div>
    </main>

    <footer class="text-center py-6 text-xs text-gray-400">
        &copy; <?php echo date('Y'); ?> OBLINK. Tous droits réservés.
    </footer>

</body>

</html>