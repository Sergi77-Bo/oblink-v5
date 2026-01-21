<?php
/*
Template Name: Facture
*/
include 'header-inc.php';
?>

<div class="max-w-5xl mx-auto px-4 pt-32 pb-32">
    <!-- Back Link (Simulating the specific nav's intent) -->
    <div class="mb-6">
        <a href="<?php echo home_url('/dashboard'); ?>"
            class="text-oblink-blue font-semibold hover:underline inline-flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Retour au tableau de bord
        </a>
    </div>

    <div class="glass-card bg-white rounded-2xl shadow-xl p-8 md:p-12">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-oblink-gray mb-3" style="font-family: 'Montserrat', sans-serif;">
                <i class="fas fa-file-invoice text-oblink-orange mr-3"></i>
                Créer une <span class="text-oblink-orange">Facture</span>
            </h1>
            <p class="text-oblink-gray/70">Facture électronique conforme aux normes françaises</p>
            <div
                class="inline-flex items-center px-4 py-2 bg-green-50 border-2 border-green-500 text-green-700 rounded-lg mt-4">
                <i class="fas fa-check-circle mr-2"></i>
                <span class="text-sm font-semibold">Conforme à la facturation électronique obligatoire</span>
            </div>
        </div>

        <form id="invoice-form" data-validate class="space-y-8">
            <!-- Invoice Info -->
            <div class="border-b border-oblink-beige pb-6">
                <h2 class="text-2xl font-bold text-oblink-gray mb-6 flex items-center">
                    <i class="fas fa-info-circle text-oblink-orange mr-3"></i>
                    Informations générales
                </h2>
                <div class="grid md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-oblink-gray mb-2">
                            Numéro de facture <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="invoiceNumber" required
                            class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition"
                            placeholder="FACT-2025-001" value="FACT-2025-001">
                        <p class="text-xs text-oblink-gray/60 mt-1">Numérotation chronologique obligatoire</p>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-oblink-gray mb-2">
                            Date d'émission <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="issueDate" required
                            class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition"
                            value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-oblink-gray mb-2">
                            Date d'échéance <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="dueDate" required
                            class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition">
                        <p class="text-xs text-oblink-gray/60 mt-1">Selon conditions de paiement</p>
                    </div>
                </div>
            </div>

            <!-- Emetteur (From) -->
            <div class="border-b border-oblink-beige pb-6">
                <h2 class="text-2xl font-bold text-oblink-gray mb-6 flex items-center">
                    <i class="fas fa-user text-oblink-blue mr-3"></i>
                    Émetteur (Vous)
                </h2>
                <div class="bg-oblink-blue/5 p-6 rounded-xl space-y-4">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-oblink-gray mb-2">
                                Nom complet <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="fromName" required
                                class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition"
                                placeholder="Sarah Dubois" value="Sarah Dubois">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-oblink-gray mb-2">
                                SIRET <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="fromSIRET" required
                                class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition"
                                placeholder="123 456 789 00012" value="123 456 789 00012">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-oblink-gray mb-2">
                            Adresse complète <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="fromAddress" required
                            class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition"
                            placeholder="123 rue de la République, 75001 Paris"
                            value="123 rue de la République, 75001 Paris">
                    </div>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-oblink-gray mb-2">
                                Email
                            </label>
                            <input type="email" name="fromEmail"
                                class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition"
                                placeholder="sarah.dubois@email.com" value="sarah.dubois@email.com">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-oblink-gray mb-2">
                                Téléphone
                            </label>
                            <input type="tel" name="fromPhone"
                                class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition"
                                placeholder="06 12 34 56 78" value="06 12 34 56 78">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-oblink-gray mb-2">
                            N° TVA Intracommunautaire
                        </label>
                        <input type="text" name="fromVAT"
                            class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition"
                            placeholder="FR12 345 678 901 (si applicable)">
                        <div class="flex items-start mt-3 p-3 bg-yellow-50 border-l-4 border-yellow-400 rounded">
                            <i class="fas fa-exclamation-triangle text-yellow-600 mr-2 mt-1"></i>
                            <p class="text-sm text-yellow-800">
                                <strong>Franchise en base de TVA :</strong> Si vous bénéficiez du régime de franchise en
                                base,
                                laissez ce champ vide et la mention "TVA non applicable, art. 293 B du CGI" sera
                                automatiquement ajoutée.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Destinataire (Client) -->
            <div class="border-b border-oblink-beige pb-6">
                <h2 class="text-2xl font-bold text-oblink-gray mb-6 flex items-center">
                    <i class="fas fa-building text-oblink-violet mr-3"></i>
                    Destinataire (Client)
                </h2>
                <div class="bg-oblink-violet/5 p-6 rounded-xl space-y-4">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-oblink-gray mb-2">
                                Nom de l'entreprise <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="toName" required
                                class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition"
                                placeholder="Optique Martin">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-oblink-gray mb-2">
                                SIRET <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="toSIRET" required
                                class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition"
                                placeholder="987 654 321 00012">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-oblink-gray mb-2">
                            Adresse complète <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="toAddress" required
                            class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition"
                            placeholder="45 avenue de la République, 33000 Bordeaux">
                    </div>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-oblink-gray mb-2">
                                Email du contact
                            </label>
                            <input type="email" name="toEmail"
                                class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition"
                                placeholder="contact@optiquemartin.fr">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-oblink-gray mb-2">
                                N° TVA Intracommunautaire
                            </label>
                            <input type="text" name="toVAT"
                                class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition"
                                placeholder="FR98 765 432 109">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Services/Lines -->
            <div class="border-b border-oblink-beige pb-6">
                <h2 class="text-2xl font-bold text-oblink-gray mb-6 flex items-center">
                    <i class="fas fa-list text-oblink-orange mr-3"></i>
                    Prestations facturées
                </h2>
                <div id="services-container" class="space-y-4">
                    <!-- Service Line 1 -->
                    <div class="service-line border-2 border-oblink-beige rounded-xl p-6">
                        <div class="grid md:grid-cols-12 gap-4 items-start">
                            <div class="md:col-span-5">
                                <label class="block text-sm font-semibold text-oblink-gray mb-2">
                                    Description détaillée <span class="text-red-500">*</span>
                                </label>
                                <textarea name="serviceDesc[]" required rows="3"
                                    class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition"
                                    placeholder="Mission de remplacement du 15/01/2025 au 17/01/2025 - Examen de vue, adaptation lentilles de contact, conseils clientèle"></textarea>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-oblink-gray mb-2">
                                    Quantité <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="serviceQty[]" required min="1" value="3"
                                    class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition service-qty"
                                    placeholder="1">
                                <p class="text-xs text-oblink-gray/60 mt-1">Jours</p>
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-oblink-gray mb-2">
                                    Prix unitaire HT (€) <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="servicePrice[]" required min="0" step="0.01" value="280"
                                    class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition service-price"
                                    placeholder="100.00">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-oblink-gray mb-2">
                                    Total HT (€)
                                </label>
                                <div
                                    class="px-4 py-3 bg-oblink-beige/50 rounded-lg font-bold text-oblink-orange text-lg service-total">
                                    840,00 €
                                </div>
                            </div>
                            <div class="md:col-span-1 flex items-end">
                                <button type="button"
                                    class="remove-service px-3 py-3 text-red-500 hover:bg-red-50 rounded-lg transition">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" id="add-service"
                    class="mt-4 px-6 py-3 border-2 border-oblink-blue text-oblink-blue rounded-lg hover:bg-oblink-blue hover:text-white transition font-semibold">
                    <i class="fas fa-plus mr-2"></i>Ajouter une ligne
                </button>
            </div>

            <!-- Totals -->
            <div class="border-b border-oblink-beige pb-6">
                <h2 class="text-2xl font-bold text-oblink-gray mb-6 flex items-center">
                    <i class="fas fa-calculator text-oblink-violet mr-3"></i>
                    Totaux
                </h2>
                <div class="bg-oblink-beige/30 p-6 rounded-xl space-y-4">
                    <div class="flex justify-between items-center text-lg">
                        <span class="font-semibold">Total HT</span>
                        <span class="text-2xl font-bold text-oblink-blue" id="total-ht">840,00 €</span>
                    </div>
                    <div class="flex justify-between items-center text-sm text-oblink-gray/70">
                        <span>TVA (Non assujetti - Franchise en base)</span>
                        <span class="font-semibold">0,00 €</span>
                    </div>
                    <div class="border-t-2 border-oblink-gray pt-4 flex justify-between items-center">
                        <span class="text-2xl font-bold">Total TTC</span>
                        <span class="text-4xl font-bold text-oblink-orange" id="total-ttc">840,00 €</span>
                    </div>
                    <div class="mt-4 p-4 bg-yellow-50 border-l-4 border-yellow-400 rounded">
                        <p class="text-sm text-yellow-800">
                            <i class="fas fa-info-circle mr-2"></i>
                            <strong>Mention obligatoire :</strong> "TVA non applicable, article 293 B du CGI"
                            sera automatiquement ajoutée à la facture si vous êtes en franchise en base.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Payment Terms & Legal Info -->
            <div class="pb-6">
                <h2 class="text-2xl font-bold text-oblink-gray mb-6 flex items-center">
                    <i class="fas fa-euro-sign text-oblink-blue mr-3"></i>
                    Conditions de paiement et mentions légales
                </h2>
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-oblink-gray mb-2">
                            Délai de paiement <span class="text-red-500">*</span>
                        </label>
                        <select name="paymentTerms" required
                            class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition">
                            <option value="30">Paiement à 30 jours</option>
                            <option value="0">Paiement comptant</option>
                            <option value="15">Paiement à 15 jours</option>
                            <option value="45">Paiement à 45 jours (dérogation légale requise)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-oblink-gray mb-2">
                            Moyens de paiement acceptés <span class="text-red-500">*</span>
                        </label>
                        <div class="space-y-2">
                            <label
                                class="flex items-center p-3 border-2 border-oblink-beige rounded-lg hover:border-oblink-orange cursor-pointer transition">
                                <input type="checkbox" name="paymentMethods" value="virement" checked
                                    class="mr-3 w-5 h-5 text-oblink-orange">
                                <span>Virement bancaire</span>
                            </label>
                            <div class="ml-8 grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-oblink-gray mb-1">
                                        IBAN <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="iban" required
                                        class="w-full px-3 py-2 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition text-sm"
                                        placeholder="FR76 1234 5678 9012 3456 7890 123"
                                        value="FR76 1234 5678 9012 3456 7890 123">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-oblink-gray mb-1">
                                        BIC <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="bic" required
                                        class="w-full px-3 py-2 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition text-sm"
                                        placeholder="BNPAFRPPXXX" value="BNPAFRPPXXX">
                                </div>
                            </div>
                            <label
                                class="flex items-center p-3 border-2 border-oblink-beige rounded-lg hover:border-oblink-orange cursor-pointer transition">
                                <input type="checkbox" name="paymentMethods" value="cheque"
                                    class="mr-3 w-5 h-5 text-oblink-orange">
                                <span>Chèque à l'ordre de : <input type="text" name="chequeName"
                                        placeholder="Sarah Dubois"
                                        class="ml-2 px-2 py-1 border-b-2 border-oblink-beige focus:border-oblink-orange focus:outline-none"></span>
                            </label>
                        </div>
                    </div>

                    <!-- Mentions légales obligatoires -->
                    <div class="bg-red-50 border-2 border-red-200 rounded-xl p-6">
                        <h3 class="font-bold text-red-800 mb-4 flex items-center text-lg">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            Mentions obligatoires (automatiquement ajoutées)
                        </h3>
                        <div class="space-y-3 text-sm text-red-700">
                            <div class="bg-white p-3 rounded-lg">
                                <strong>Pénalités de retard :</strong> En cas de retard de paiement, des pénalités de
                                retard calculées
                                au taux de <strong>3 fois le taux d'intérêt légal</strong> seront exigibles de plein
                                droit,
                                conformément à l'article L441-10 du Code de commerce.
                            </div>
                            <div class="bg-white p-3 rounded-lg">
                                <strong>Indemnité forfaitaire :</strong> Une indemnité forfaitaire de <strong>40
                                    euros</strong>
                                pour frais de recouvrement sera due de plein droit en cas de retard de paiement
                                (articles D441-5 et L441-10 du Code de commerce).
                            </div>
                            <div class="bg-white p-3 rounded-lg">
                                <strong>Escompte :</strong> Aucun escompte n'est accordé en cas de paiement anticipé
                                (sauf mention contraire ci-dessous).
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="block text-sm font-semibold text-red-800 mb-2">
                                Escompte pour paiement anticipé (optionnel)
                            </label>
                            <input type="text" name="discount"
                                class="w-full px-4 py-3 border-2 border-red-200 rounded-lg focus:border-red-400 focus:outline-none transition"
                                placeholder="Ex: 2% pour paiement sous 8 jours">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-oblink-gray mb-2">
                            Notes / Commentaires
                        </label>
                        <textarea name="notes" rows="4"
                            class="w-full px-4 py-3 border-2 border-oblink-beige rounded-lg focus:border-oblink-orange focus:outline-none transition"
                            placeholder="Merci pour votre confiance. N'hésitez pas à me recontacter pour vos prochains besoins."></textarea>
                    </div>
                </div>
            </div>

            <!-- Signature -->
            <div class="border-b border-oblink-beige pb-6">
                <h2 class="text-2xl font-bold text-oblink-gray mb-6 flex items-center">
                    <i class="fas fa-signature text-oblink-blue mr-3"></i>
                    Signature et Validation
                </h2>
                <div class="bg-gray-50 rounded-xl p-6 border-2 border-dashed border-gray-300">
                    <p class="text-sm font-semibold text-gray-500 mb-2">Signature de l'émetteur (Vous)</p>
                    <canvas id="signature-pad"
                        class="bg-white border border-gray-200 rounded-lg shadow-sm w-full h-40 cursor-crosshair"></canvas>
                    <div class="flex justify-between mt-2">
                        <button type="button" id="clear-signature"
                            class="text-xs text-red-500 hover:text-red-700 underline">
                            Effacer la signature
                        </button>
                        <span class="text-xs text-green-600 hidden" id="sig-status"><i
                                class="fas fa-check mr-1"></i>Signé</span>
                    </div>
                    <input type="hidden" name="signatureData" id="signature-data">
                </div>
                <div class="mt-4 flex items-start p-3 bg-blue-50 text-blue-800 rounded-lg text-sm">
                    <i class="fas fa-lock mt-1 mr-2"></i>
                    <p>En signant, vous certifiez l'exactitude des informations. Un certificat numérique sera apposé au
                        PDF final.</p>
                </div>
            </div>

            <!-- Submit -->
            <div class="flex gap-4">
                <a href="<?php echo home_url('/dashboard/invoices'); ?>"
                    class="flex-1 px-6 py-4 border-2 border-oblink-gray text-oblink-gray text-center rounded-lg hover:bg-oblink-gray/5 transition font-semibold">
                    Annuler
                </a>
                <button type="button"
                    onclick="alert('Fonctionnalité simulée: Facture envoyée à votre email (compta@entreprise.com)')"
                    class="flex-1 px-6 py-4 bg-gray-800 text-white rounded-lg hover:bg-gray-700 transition font-semibold">
                    <i class="fas fa-envelope-open-text mr-2"></i>Envoyer au comptable
                </button>
                <button type="submit"
                    class="flex-1 px-6 py-4 bg-oblink-orange text-white rounded-lg hover:bg-oblink-orange/90 transition font-semibold shadow-lg">
                    <i class="fas fa-paper-plane mr-2"></i>Émettre & Envoyer
                </button>
            </div>
        </form>
    </div>

    <!-- Legal Compliance Info -->
    <div class="mt-8 bg-green-50 border-2 border-green-500 rounded-xl p-6">
        <h3 class="font-bold text-green-800 mb-3 flex items-center text-lg">
            <i class="fas fa-check-circle text-green-600 mr-2"></i>
            Facture électronique conforme à la réglementation française
        </h3>
        <div class="text-sm text-green-700 space-y-3">
            <p><strong>Votre facture inclura automatiquement toutes les mentions légales obligatoires :</strong></p>
            <div class="grid md:grid-cols-2 gap-4">
                <ul class="list-disc list-inside space-y-1 ml-4">
                    <li>Numéro de facture unique et chronologique</li>
                    <li>Date d'émission et date d'échéance</li>
                    <li>Identité complète émetteur (SIRET, adresse)</li>
                    <li>Identité complète client (SIRET, adresse)</li>
                    <li>Description détaillée des prestations</li>
                    <li>Prix unitaires HT et quantités</li>
                    <li>Total HT, TVA et Total TTC</li>
                </ul>
                <ul class="list-disc list-inside space-y-1 ml-4">
                    <li>Mention TVA si franchise en base (Art. 293B CGI)</li>
                    <li>Conditions de règlement</li>
                    <li>Coordonnées bancaires (IBAN/BIC)</li>
                    <li>Pénalités de retard (3x taux légal)</li>
                    <li>Indemnité forfaitaire de 40€</li>
                    <li>Escompte si paiement anticipé</li>
                    <li>Format archivable (PDF/A-3 avec XML)</li>
                </ul>
            </div>
            <div class="mt-4 p-4 bg-white rounded-lg border-l-4 border-green-600">
                <p class="font-semibold text-green-800 mb-2">
                    <i class="fas fa-info-circle mr-2"></i>Facturation électronique obligatoire depuis 2024
                </p>
                <p class="text-green-700">
                    Conformément à la réforme de la facturation électronique, toutes les factures entre professionnels
                    (B2B)
                    doivent être émises et transmises au format électronique via une plateforme de dématérialisation
                    certifiée
                    ou via le portail public de facturation (PPF). OBLINK vous aide à rester conforme.
                </p>
            </div>
        </div>
    </div>
</div>

<script>
    // --- Signature Logic ---
    const canvas = document.getElementById('signature-pad');
    const ctx = canvas.getContext('2d');
    let isDrawing = false;
    let lastX = 0;
    let lastY = 0;

    // Resize canvas
    function resizeCanvas() {
        const ratio = Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        ctx.scale(ratio, ratio);
        ctx.strokeStyle = "#000";
        ctx.lineWidth = 2;
        ctx.lineCap = "round";
    }
    window.addEventListener("resize", resizeCanvas);
    resizeCanvas(); // Initial call happens fast, might need delay if element not visible yet

    // Draw
    function draw(e) {
        if (!isDrawing) return;

        // precise coordinates
        const rect = canvas.getBoundingClientRect();
        const clientX = e.type.includes('touch') ? e.touches[0].clientX : e.clientX;
        const clientY = e.type.includes('touch') ? e.touches[0].clientY : e.clientY;
        const scaleX = canvas.width / rect.width / (window.devicePixelRatio || 1); // Adjust for logical size

        const x = (clientX - rect.left);
        const y = (clientY - rect.top);

        ctx.beginPath();
        ctx.moveTo(lastX, lastY);
        ctx.lineTo(x, y);
        ctx.stroke();
        [lastX, lastY] = [x, y];

        document.getElementById('sig-status').classList.remove('hidden');
    }

    canvas.addEventListener('mousedown', (e) => {
        isDrawing = true;
        const rect = canvas.getBoundingClientRect();
        lastX = e.clientX - rect.left;
        lastY = e.clientY - rect.top;
    });
    canvas.addEventListener('mousemove', draw);
    canvas.addEventListener('mouseup', () => isDrawing = false);
    canvas.addEventListener('mouseout', () => isDrawing = false);

    // Touch support
    canvas.addEventListener('touchstart', (e) => {
        e.preventDefault();
        isDrawing = true;
        const rect = canvas.getBoundingClientRect();
        lastX = e.touches[0].clientX - rect.left;
        lastY = e.touches[0].clientY - rect.top;
    });
    canvas.addEventListener('touchmove', (e) => {
        e.preventDefault();
        draw(e);
    });
    canvas.addEventListener('touchend', () => isDrawing = false);

    // Clear
    document.getElementById('clear-signature').addEventListener('click', () => {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        document.getElementById('sig-status').classList.add('hidden');
    });


    // --- Existing Calculator Logic ---

    // Calculate totals
    function calculateTotals() {
        let total = 0;
        document.querySelectorAll('.service-line').forEach(line => {
            const qty = parseFloat(line.querySelector('.service-qty').value) || 0;
            const price = parseFloat(line.querySelector('.service-price').value) || 0;
            const lineTotal = qty * price;
            line.querySelector('.service-total').textContent = lineTotal.toFixed(2).replace('.', ',') + ' €';
            total += lineTotal;
        });
        document.getElementById('total-ht').textContent = total.toFixed(2).replace('.', ',') + ' €';
        document.getElementById('total-ttc').textContent = total.toFixed(2).replace('.', ',') + ' €';
    }

    // Add service line
    document.getElementById('add-service').addEventListener('click', function () {
        const template = document.querySelector('.service-line').cloneNode(true);
        template.querySelectorAll('input, textarea').forEach(input => input.value = '');
        template.querySelector('.service-qty').value = '1';
        template.querySelector('.service-price').value = '';
        template.querySelector('.service-total').textContent = '0,00 €';
        document.getElementById('services-container').appendChild(template);
        attachEventListeners();
    });

    // Remove service line
    function attachEventListeners() {
        document.querySelectorAll('.remove-service').forEach(btn => {
            btn.onclick = function () {
                if (document.querySelectorAll('.service-line').length > 1) {
                    this.closest('.service-line').remove();
                    calculateTotals();
                } else {
                    alert('Vous devez avoir au moins une prestation');
                }
            };
        });

        document.querySelectorAll('.service-qty, .service-price').forEach(input => {
            input.addEventListener('input', calculateTotals);
        });
    }

    // URL Params Pre-fill (V51)
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('from') === 'devis') {
        if (urlParams.get('client')) document.querySelector('input[name="toName"]').value = urlParams.get('client');
        if (urlParams.get('address')) document.querySelector('input[name="toAddress"]').value = urlParams.get('address');

        // Add a notification toast (simulated)
        const toast = document.createElement('div');
        toast.className = 'fixed top-4 right-4 bg-blue-600 text-white px-6 py-4 rounded-xl shadow-xl z-50 animate-bounce';
        toast.innerHTML = '<i class="fas fa-magic mr-2"></i>Données du devis importées !';
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    // Form submission
    document.getElementById('invoice-form').addEventListener('submit', function (e) {
        e.preventDefault();

        // Check if signed
        const hasSignature = !document.getElementById('sig-status').classList.contains('hidden');
        if (!hasSignature) {
            alert('Veuillez signer la facture avant de l\'émettre.');
            return;
        }

        const clientName = document.querySelector('input[name="toName"]').value;
        alert(`Facture émise avec succès !\n\n1. Copie envoyée à ${clientName} (Email)\n2. Copie archivée dans le grimoire numérique.`);

        // Redirect to dashboard after success
        setTimeout(() => {
            window.location.href = '<?php echo home_url("/dashboard-entreprise"); ?>';
        }, 1000);
    });

    attachEventListeners();
    calculateTotals();
    // Re-trigger resize after small delay to ensure container is rendered
    setTimeout(resizeCanvas, 100);
</script>

<?php include get_template_directory() . "/footer-content.php";
wp_footer(); ?>