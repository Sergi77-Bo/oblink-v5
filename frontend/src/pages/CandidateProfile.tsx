import ProfileForm from '../components/ProfileForm';

export default function CandidateProfilePage() {
    return (
        <div className="py-6">
            <div className="max-w-3xl mx-auto">
                <h1 className="text-3xl font-bold mb-8 text-center font-primary text-brand-dark">Mon Espace Candidat</h1>
                <ProfileForm />
            </div>
        </div>
    );
}
