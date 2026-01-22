import { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { API_URL } from '../config';

export default function Login() {
    const [username, setUsername] = useState('');
    const [password, setPassword] = useState('');
    const navigate = useNavigate();

    const handleLogin = async (e: React.FormEvent) => {
        e.preventDefault();
        try {
            const res = await fetch(`${API_URL}/api/token/`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ username, password })
            });

            if (!res.ok) throw new Error('Identifiants incorrects');

            const data = await res.json();
            // On stocke le token pour que les autres requêtes (Profil) puissent l'utiliser
            localStorage.setItem('access_token', data.access);
            localStorage.setItem('refresh_token', data.refresh);

            // Redirection vers le profil
            navigate('/candidat/profil');

        } catch (err) {
            alert("Erreur de connexion : Vérifiez vos identifiants");
        }
    };

    return (
        <div className="min-h-[80vh] flex items-center justify-center">
            <div className="bg-white p-8 rounded-xl shadow-xl w-full max-w-md border border-gray-100">
                <h1 className="text-3xl font-extrabold text-brand-dark mb-6 text-center font-primary">Connexion</h1>

                <form onSubmit={handleLogin} className="space-y-5">
                    <div>
                        <label className="block text-sm font-medium text-gray-700 mb-1">Nom d'utilisateur</label>
                        <input
                            type="text"
                            value={username}
                            onChange={e => setUsername(e.target.value)}
                            className="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-brand-primary outline-none transition"
                            placeholder="ex: admin"
                        />
                    </div>

                    <div>
                        <label className="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                        <input
                            type="password"
                            value={password}
                            onChange={e => setPassword(e.target.value)}
                            className="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-brand-primary outline-none transition"
                            placeholder="••••••••"
                        />
                    </div>

                    <button
                        type="submit"
                        className="w-full bg-brand-primary text-white py-3 rounded-lg font-bold hover:bg-orange-600 transition shadow-lg hover:shadow-orange-500/30 transform hover:-translate-y-0.5"
                    >
                        Se connecter
                    </button>
                </form>

                <p className="mt-6 text-center text-sm text-gray-500">
                    Pas encore de compte ? <span className="text-brand-primary font-medium cursor-pointer">Inscrivez-vous</span>
                </p>
            </div>
        </div>
    );
}
