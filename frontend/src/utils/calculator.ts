export const calculateFreelanceNet = (tjm: number, days: number) => {
    const ca = tjm * days;
    // Hypothèse simplifiée 2026 : Micro-BNC (~23% charges) vs SASU (~45% mais déductible)
    // On prend le cas Micro-BNC classique pour l'exemple
    const chargesMicro = ca * 0.23;
    const netMicro = ca - chargesMicro;

    // Comparatif Salarié (approx) : On divise par ~1.8 pour avoir le net avant impôt vs superbrut
    // C'est juste pour donner une échelle
    const salaireEquivalent = (ca * 0.55);

    return { ca, netMicro, salaireEquivalent };
};
