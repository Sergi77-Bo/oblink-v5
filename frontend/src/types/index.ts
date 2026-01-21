export interface Company {
    id: number;
    company_name: string;
    network_brand: string;
    subscription_tier: string;
}

export interface Mission {
    id: number;
    company: Company;
    title: string;
    description: string;
    job_type: 'CDI' | 'FREELANCE' | 'ALTERNANCE';
    software_required: string[]; // C'est un JSONField qui renvoie une liste de strings
    city: string;
    is_active: boolean;
    created_at: string;
    years_experience: number;
    daily_rate: number;
}
