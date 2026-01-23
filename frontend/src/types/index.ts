export interface Company {
    id: number;
    companyName: string;
    networkBrand: string;
    subscriptionTier: string;
}

export interface Mission {
    id: number;
    company: Company;
    title: string;
    description: string;
    jobType: 'CDI' | 'FREELANCE' | 'ALTERNANCE';
    softwareRequired: string[]; // C'est un JSONField qui renvoie une liste de strings
    city: string;
    isActive: boolean;
    createdAt: string;
    yearsExperience: number;
    dailyRate: number;
}
