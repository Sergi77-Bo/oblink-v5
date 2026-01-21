<?php
/*
Template Name: OBLINK Certificate
*/

// Security Check: Ensure valid access (normally checked via UUID in URL)
$cert_id = get_query_var('cert_id', 'DEMO-123456');
$student_name = isset($_GET['student']) ? sanitize_text_field($_GET['student']) : 'Étudiant OBLINK';
$score = isset($_GET['score']) ? intval($_GET['score']) : 100;
$date = date('d/m/Y');

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificat de Réussite -
        <?php echo $student_name; ?>
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts for "Diploma" look -->
    <link
        href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <style>
        .font-diploma {
            font-family: 'Cinzel', serif;
        }

        .font-serif-body {
            font-family: 'Playfair Display', serif;
        }

        .watermark {
            background-image: url('https://www.svgrepo.com/show/499664/certificate.svg');
            /* Placeholder icon */
            background-repeat: no-repeat;
            background-position: center;
            background-size: 50%;
            opacity: 0.03;
        }

        .border-fancy {
            border: 8px double #1e3a8a;
            /* oblink-blue approx */
            padding: 4px;
        }

        .border-fancy-inner {
            border: 2px solid #ea580c;
            /* oblink-orange approx */
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center p-4">

    <!-- Actions Bar -->
    <div class="mb-8 flex gap-4 no-print">
        <button onclick="downloadPDF()"
            class="bg-blue-600 text-white px-6 py-2 rounded-full font-bold shadow-lg hover:bg-blue-700 transition flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
            </svg>
            Télécharger le PDF
        </button>
        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(home_url('/verify/' . $cert_id)); ?>"
            target="_blank"
            class="bg-[#0077b5] text-white px-6 py-2 rounded-full font-bold shadow-lg hover:bg-[#006396] transition flex items-center gap-2">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
            </svg>
            Partager sur LinkedIn
        </a>
    </div>

    <!-- CERTIFICATE CONTAINER -->
    <div id="certificate"
        class="bg-white w-[297mm] h-[210mm] shadow-2xl relative flex p-10 mx-auto text-gray-800 watermark">
        <div class="border-fancy w-full h-full p-2">
            <div class="border-fancy-inner w-full h-full relative flex flex-col items-center justify-between p-12">

                <!-- Header -->
                <div class="text-center w-full">
                    <div class="flex items-center justify-center gap-2 mb-2 text-oblink-blue">
                        <!-- Logo Placeholder -->
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-orange-500 to-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-xs">
                            OB</div>
                        <span class="font-bold tracking-[0.2em] text-gray-400 text-sm">OBLINK ACADEMY</span>
                    </div>
                    <h1 class="font-diploma text-5xl md:text-6xl text-gray-900 mb-2 mt-4 uppercase tracking-widest">
                        Certificat de Réussite</h1>
                    <h2 class="font-serif-body text-2xl text-orange-600 italic">Expert ERP Optique (Cosium 2026)</h2>
                </div>

                <!-- Body -->
                <div class="text-center w-3/4 mx-auto my-6">
                    <p class="font-serif-body text-xl text-gray-500 mb-4">Le présent certificat est délivré à</p>
                    <div
                        class="font-diploma text-4xl text-gray-900 border-b-2 border-gray-300 pb-2 mb-6 inline-block min-w-[300px]">
                        <?php echo $student_name; ?>
                    </div>
                    <p class="font-serif-body text-lg text-gray-600 leading-relaxed">
                        Pour avoir complété avec succès le parcours de formation avancée et validé l'examen de
                        certification <strong class="text-gray-900">"Cosium Expert : Flux Métiers & Optimisation
                            Tiers-Payant"</strong> avec un score d'excellence de <strong class="text-blue-600">
                            <?php echo $score; ?>%
                        </strong>.
                    </p>
                </div>

                <!-- Skills -->
                <div class="w-full grid grid-cols-2 gap-8 my-4 px-12">
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                            <span class="font-serif-body text-sm text-gray-700"><strong>Ingénierie Tiers-Payant</strong>
                                (Flux AMC/DRE)</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                            <span class="font-serif-body text-sm text-gray-700"><strong>Conformité 2026</strong> (100%
                                Santé & Devis)</span>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                            <span class="font-serif-body text-sm text-gray-700"><strong>Logistique EDI</strong> (Appro &
                                Stocks)</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                            <span class="font-serif-body text-sm text-gray-700"><strong>Performance</strong> (Pilotage
                                Marge & Dossiers)</span>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="w-full flex items-end justify-between mt-8 border-t border-gray-200 pt-8">
                    <div class="text-left">
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Date de délivrance</p>
                        <p class="font-diploma text-lg">
                            <?php echo $date; ?>
                        </p>
                        <p class="text-[10px] text-gray-400 mt-2">ID:
                            <?php echo $cert_id; ?>
                        </p>
                    </div>

                    <div class="text-center">
                        <!-- Simplified Seal -->
                        <div
                            class="w-24 h-24 border-4 border-orange-500 rounded-full flex items-center justify-center p-1 rotate-[-10deg] opacity-80">
                            <div
                                class="w-full h-full border border-orange-500 rounded-full flex flex-col items-center justify-center text-orange-600 pb-1">
                                <span class="text-[8px] font-bold uppercase tracking-widest">Officiel</span>
                                <span class="font-diploma text-xl font-black">OBLINK</span>
                                <span class="text-[8px] font-bold uppercase tracking-widest">Academy</span>
                            </div>
                        </div>
                    </div>

                    <div class="text-right flex flex-col items-end">
                        <p class="text-xs text-gray-400 uppercase tracking-wider mb-2">Vérifier l'authenticité</p>
                        <div id="qrcode" class="mb-2"></div>
                        <p class="font-diploma text-sm text-gray-900">Le Comité Pédagogique</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Generate QR Code
        const verifyUrl = "<?php echo home_url('/verify/' . $cert_id); ?>";
        new QRCode(document.getElementById("qrcode"), {
            text: verifyUrl,
            width: 80,
            height: 80,
            colorDark: "#1f2937",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });

        // PDF Generation
        function downloadPDF() {
            const { jsPDF } = window.jspdf;
            const element = document.getElementById('certificate');

            // Adjust scale for better quality
            html2canvas(element, { scale: 2 }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF('l', 'mm', 'a4'); // Landscape, A4
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = pdf.internal.pageSize.getHeight();

                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                pdf.save("Certificat-Oblink-<?php echo $cert_id; ?>.pdf");
            });
        }
    </script>
</body>

</html>