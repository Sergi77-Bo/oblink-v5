<?php
/*
Template Name: Page Generateur Contrat
*/
include 'header-inc.php';
?>

<!-- CDN pour la génération de PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<div class="min-h-screen bg-gray-50 pt-32 pb-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <span class="inline-block py-1 px-3 rounded-full bg-oblink-blue/10 text-oblink-blue font-bold text-sm mb-4 uppercase tracking-wider">
                Outil Juridique Gratuit
            </span>
            <h1 class="text-4xl font-bold font-display text-oblink-gray mb-4">
                Générateur de Contrat <span class="text-oblink-blue">Expert Optique</span>
            </h1>
            <p class="text-lg text-gray-500 max-w-2xl mx-auto">
                Créez une convention de prestation sur-mesure. 
                <span class="text-oblink-orange font-bold block mt-2 text-sm"><i class="fas fa-certificate mr-1"></i> Idéal pour valoriser une expertise spécifique (Vente, Réfraction, Atelier).</span>
            </p>
        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            <form id="contract-form" class="p-8 md:p-12">
                
                <!-- SECTION 1 : The Parties -->
                <div class="grid md:grid-cols-2 gap-12 mb-12">
                    
                    <!-- Client (Magasin) -->
                    <div>
                        <h3 class="text-xl font-bold text-oblink-gray mb-6 flex items-center gap-2">
                            <i class="fas fa-store text-oblink-blue"></i> Le Client (Magasin)
                        </h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">Raison Sociale</label>
                                <input type="text" id="client_name" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-oblink-blue outline-none" placeholder="Ex: SAS Optic Vision" required>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">SIRET</label>
                                <input type="text" id="client_siret" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-oblink-blue outline-none" placeholder="14 chiffres" required>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">Adresse Complète</label>
                                <input type="text" id="client_address" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-oblink-blue outline-none" placeholder="10 rue de la République, 75000 Paris" required>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">Représenté par</label>
                                <input type="text" id="client_rep" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-oblink-blue outline-none" placeholder="M. Dupont (Gérant)" required>
                            </div>
                        </div>
                    </div>

                    <!-- Prestataire (Opticien) -->
                    <div>
                        <h3 class="text-xl font-bold text-oblink-gray mb-6 flex items-center gap-2">
                            <i class="fas fa-user-tie text-oblink-orange"></i> Le Prestataire (Freelance)
                        </h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">Nom & Prénom</label>
                                <input type="text" id="freelance_name" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-oblink-orange outline-none" placeholder="Ex: Julie Martin" required>
                            </div>
                            
                            <!-- Qualification Selector -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">Niveau de Qualification</label>
                                <select id="freelance_qualif" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-oblink-orange outline-none" onchange="toggleAdeli()">
                                    <option value="opticien">Opticien Diplômé (BTS)</option>
                                    <option value="monteur">Monteur-Vendeur (Non diplômé)</option>
                                    <option value="expert_refraction">Expert Réfraction / Optométrie</option>
                                    <option value="consultant">Consultant Vente / Business</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">SIRET (Auto-entrepreneur)</label>
                                <input type="text" id="freelance_siret" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-oblink-orange outline-none" placeholder="14 chiffres" required>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">Adresse</label>
                                <input type="text" id="freelance_address" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-oblink-orange outline-none" required>
                            </div>
                            
                            <!-- ADELI : S'affiche seulement si Opticien -->
                            <div id="adeli-field">
                                <label class="block text-sm font-bold text-gray-700 mb-1">Numéro ADELI / RPPS</label>
                                <input type="text" id="freelance_adeli" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-oblink-orange outline-none" placeholder="Obligatoire pour les diplômés">
                            </div>
                        </div>
                    </div>

                </div>

                <hr class="border-gray-100 my-8">

                <!-- SECTION 2 : Mission Details with Expertise -->
                <div class="mb-12">
                    <h3 class="text-xl font-bold text-oblink-gray mb-6">Objet de la Mission</h3>
                    
                    <!-- Expertise Type -->
                    <div class="bg-blue-50 p-6 rounded-xl border border-blue-100 mb-6">
                        <label class="block text-sm font-bold text-gray-700 mb-3">Nature de l'intervention (Le "Plus" Expert)</label>
                        <select id="mission_expertise" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-oblink-blue outline-none font-bold text-oblink-blue">
                            <option value="standard">Renfort Technique Standard (Vente/Atelier)</option>
                            <option value="examen">Expertise Examens de Vue & Santé Visuelle</option>
                            <option value="business">Coaching Vente & Développement C.A.</option>
                            <option value="atelier">Expertise Montage Complexe & SAV</option>
                            <option value="audit">Audit Organisation & Process Magasin</option>
                        </select>
                        <p class="text-xs text-gray-500 mt-2">
                            <i class="fas fa-info-circle mr-1"></i> Préciser une expertise spécifique renforce l'indépendance de la mission vis-à-vis de l'URSSAF.
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3">Durée</label>
                            <div class="flex gap-4">
                                <label class="cursor-pointer">
                                    <input type="radio" name="mission_type" value="short" class="peer sr-only" checked onchange="toggleMissionDates()">
                                    <div class="px-4 py-3 rounded-lg border-2 border-gray-200 peer-checked:border-oblink-blue peer-checked:bg-white transition text-center">
                                        <span class="block font-bold text-sm">Vacation Ponctuelle</span>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="mission_type" value="long" class="peer sr-only" onchange="toggleMissionDates()">
                                    <div class="px-4 py-3 rounded-lg border-2 border-gray-200 peer-checked:border-oblink-blue peer-checked:bg-white transition text-center">
                                        <span class="block font-bold text-sm">Mission Longue</span>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Dynamic Date Inputs -->
                        <div id="date-container-short">
                            <label class="block text-sm font-bold text-gray-700 mb-1">Dates d'intervention</label>
                            <input type="text" id="mission_dates_short" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-oblink-blue outline-none" placeholder="Ex: Du 12 au 14 Juillet">
                        </div>
                        <div id="date-container-long" class="hidden">
                            <label class="block text-sm font-bold text-gray-700 mb-1">Date de démarrage</label>
                            <input type="date" id="mission_start_long" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-oblink-blue outline-none">
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Honoraires H.T.</label>
                        <div class="flex gap-4">
                            <input type="number" id="mission_price" class="w-1/3 px-4 py-2 rounded-lg border border-gray-200 focus:border-oblink-blue outline-none" placeholder="Ex: 350" required>
                            <select id="mission_unit" class="w-1/4 px-4 py-2 rounded-lg border border-gray-200 focus:border-oblink-blue outline-none">
                                <option value="euros / jour">Euros / Jour</option>
                                <option value="euros / heure">Euros / Heure</option>
                                <option value="euros forfait">Forfait Global</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- SECTION 3 : Mandatory Checkboxes -->
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 mb-8">
                    <h4 class="font-bold text-oblink-gray mb-4 flex items-center gap-2">
                        <i class="fas fa-check-circle text-green-500"></i> Engagements Réciproques
                    </h4>
                    <div class="space-y-2">
                        <label class="flex items-start gap-3">
                            <input type="checkbox" required class="mt-1 w-4 h-4 text-oblink-blue rounded border-gray-300">
                            <span class="text-sm text-gray-600">Le Prestataire déclare disposer des <strong>compétences et diplômes</strong> requis pour l'expertise choisie.</span>
                        </label>
                        <label class="flex items-start gap-3">
                            <input type="checkbox" required class="mt-1 w-4 h-4 text-oblink-blue rounded border-gray-300">
                            <span class="text-sm text-gray-600">Obligation de moyens : Le Prestataire mettra tout en œuvre pour atteindre les objectifs (ex: CA), sans obligation de résultat garantie.</span>
                        </label>
                        <label class="flex items-start gap-3">
                            <input type="checkbox" required class="mt-1 w-4 h-4 text-oblink-blue rounded border-gray-300">
                            <span class="text-sm text-gray-600">Respect de la confidentialité, du RGPD et du secret professionnel.</span>
                        </label>
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="button" onclick="generatePDF()" class="px-8 py-4 bg-gradient-to-r from-oblink-blue to-oblink-violet text-white font-bold text-lg rounded-xl shadow-lg hover:shadow-2xl hover:scale-105 transition-all flex items-center gap-3">
                        <i class="fas fa-file-contract"></i> Générer le Contrat Expert PDF
                    </button>
                </div>

            </form>
        </div>
        
    </div>
</div>

<script>
function toggleMissionDates() {
    const isShort = document.querySelector('input[name="mission_type"]:checked').value === 'short';
    document.getElementById('date-container-short').classList.toggle('hidden', !isShort);
    document.getElementById('date-container-long').classList.toggle('hidden', isShort);
}

function toggleAdeli() {
    const qualif = document.getElementById('freelance_qualif').value;
    const adeliField = document.getElementById('adeli-field');
    const isMedical = (qualif === 'opticien' || qualif === 'expert_refraction');
    
    adeliField.style.display = isMedical ? 'block' : 'none';
}

function generatePDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // --- DATA ---
    const client = {
        name: document.getElementById('client_name').value,
        siret: document.getElementById('client_siret').value,
        addr: document.getElementById('client_address').value,
        rep: document.getElementById('client_rep').value
    };
    const qualif = document.getElementById('freelance_qualif').value;
    const freelance = {
        name: document.getElementById('freelance_name').value,
        siret: document.getElementById('freelance_siret').value,
        addr: document.getElementById('freelance_address').value,
        // Get generic label for qualification
        role_label: document.getElementById('freelance_qualif').options[document.getElementById('freelance_qualif').selectedIndex].text
    };
    
    // Safety check
    if(!client.name || !freelance.name) { alert("Merci de remplir l'identité des deux parties."); return; }

    // Mission Details
    const missionType = document.querySelector('input[name="mission_type"]:checked').value;
    const dates = missionType === 'short' 
        ? "Vacation précise : " + document.getElementById('mission_dates_short').value 
        : "Mission longue à compter du : " + document.getElementById('mission_start_long').value;
    
    const expertiseValue = document.getElementById('mission_expertise').value;
    const expertiseLabel = document.getElementById('mission_expertise').options[document.getElementById('mission_expertise').selectedIndex].text;

    // --- PDF BUILD ---
    let y = 20;

    doc.setFontSize(20);
    doc.setFont("helvetica", "bold");
    doc.text("CONTRAT DE PRESTATION DE SERVICE", 105, y, { align: "center" });
    y += 10;
    doc.setFontSize(14);
    doc.setTextColor(100);
    doc.text(expertiseLabel.toUpperCase(), 105, y, { align: "center" }); // Subtitle: Expertise
    doc.setTextColor(0);
    y += 15;
    
    doc.setFontSize(10);
    doc.setFont("helvetica", "normal");
    
    // PARTIES
    const partyBlock = (title, data) => {
        doc.setFont("helvetica", "bold");
        doc.text(title, 20, y);
        y += 5;
        doc.setFont("helvetica", "normal");
        doc.text("Raison Sociale / Nom : " + data.name, 20, y); y+=5;
        doc.text("SIRET : " + data.siret, 20, y); y+=5;
        doc.text("Adresse : " + data.addr, 20, y); y+=5;
        if(data.rep) doc.text("Représenté par : " + data.rep, 20, y);
        if(data.role_label) doc.text("Qualification déclarée : " + data.role_label, 20, y);
        y+=10;
    }

    partyBlock("LE CLIENT (DONNEUR D'ORDRE) :", client);
    partyBlock("LE PRESTATAIRE (FREELANCE) :", freelance);
    
    // CLAUSES HELPER
    const addClause = (title, content) => {
        if(y > 270) { doc.addPage(); y = 20; }
        doc.setFont("helvetica", "bold");
        doc.text(title, 20, y);
        y += 5;
        doc.setFont("helvetica", "normal");
        const lines = doc.splitTextToSize(content, 170);
        doc.text(lines, 20, y);
        y += (lines.length * 5) + 8;
    };

    // 1. OBJET (Spécifique avec expertise)
    let expertClause = "Le Client confie au Prestataire une mission spécifique de : " + expertiseLabel + ".\n";
    expertClause += "Le Prestataire mettra en œuvre son savoir-faire technique et commercial pour atteindre les objectifs fixés (notamment en termes de performance ou de qualité).\n";
    expertClause += "Cette mission ne constitue en aucun cas un remplacement standard de salarié mais un apport d'expertise externe.\n";
    expertClause += dates;

    addClause("ARTICLE 1 - OBJET DE LA MISSION D'EXPERTISE", expertClause);

    // 2. INDEPENDANCE (Bouclier URSSAF)
    addClause("ARTICLE 2 - INDEPENDANCE ET ABSENCE DE LIEN DE SUBORDINATION", 
        "Le Prestataire exerce sa mission en totale autonomie. Il n'est soumis à aucun horaire fixe imposé (sauf contraintes d'ouverture du magasin) ni à aucune directive hiérarchique.\n" +
        "Il organise son travail librement pour atteindre les objectifs de la mission."
    );

    // 3. PRIX
    addClause("ARTICLE 3 - HONORAIRES", 
        "En contrepartie, le Client versera : " + document.getElementById('mission_price').value + " " + document.getElementById('mission_unit').value + " (HT).\n" +
        "Le Prestataire ne garantit pas de chiffre d'affaires minimum (Obligation de moyens)."
    );

    // 4. RGPD
    addClause("ARTICLE 4 - CONFIDENTALITE ET DONNEES", 
        "Si la mission implique l'accès à des données clients, le Prestataire agit comme sous-traitant RGPD et s'engage au secret professionnel absolu."
    );

    // 5. RUPTURE
    if(missionType === 'short') {
        addClause("ARTICLE 5 - ANNULATION", "Toute annulation < 72h par le Client entraîne 50% d'indemnités. < 24h : 100% dû.");
    } else {
        addClause("ARTICLE 5 - PREAVIS DE RUPTURE", "Préavis progressif selon l'ancienneté de la relation commerciale (loi Hamon/Code de commerce).");
    }

    // SIGNATURES
    if(y > 240) { doc.addPage(); y = 20; }
    y += 15;
    doc.text("Fait le " + new Date().toLocaleDateString(), 20, y);
    y += 10;
    doc.text("Le Client (Signature)", 20, y);
    doc.text("Le Prestataire (Signature)", 120, y);

    doc.save("Contrat_" + expertiseValue + "_" + freelance.name + ".pdf");
}

// Init
toggleAdeli();
</script>

<?php include get_template_directory() . "/footer-content.php"; wp_footer(); ?>