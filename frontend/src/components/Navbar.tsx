import { Link, useLocation, useNavigate } from 'react-router-dom';
import { useState } from 'react';

export default function Navbar() {
    const [isMenuOpen, setIsMenuOpen] = useState(false);
    const location = useLocation();
    const navigate = useNavigate();

    const handleLogout = () => {
        localStorage.removeItem('access_token');
        localStorage.removeItem('refresh_token');
        alert("Vous avez été déconnecté.");
        navigate('/login');
    };

    const isActive = (path: string) => location.pathname.startsWith(path);
    const isLoggedIn = !!localStorage.getItem('access_token');

    return (
        <nav className="bg-white/95 backdrop-blur-md border-b border-gray-100 sticky top-0 z-50 shadow-sm transition-all">
            <div className="container mx-auto px-4 h-20 flex items-center justify-between">
                {/* LOGO */}
                <Link to="/" className="font-primary text-2xl font-extrabold tracking-tight text-brand-dark hover:opacity-80 transition-opacity">
                    OBLINK<span className="text-brand-primary">.</span>
                </Link>

                {/* DESKTOP MENU */}
                <div className="hidden md:flex items-center gap-8">
                    <Link
                        to="/missions"
                        className={`font-medium transition-colors relative group ${isActive('/missions') ? 'text-brand-primary' : 'text-brand-dark hover:text-brand-primary'}`}
                    >
                        Trouver une mission
                        <span className={`absolute bottom-0 left-0 h-0.5 bg-brand-primary transition-all ${isActive('/missions') ? 'w-full' : 'w-0 group-hover:w-full'}`}></span>
                    </Link>

                    <Link
                        to="/candidat/profil"
                        className={`font-medium transition-colors relative group ${isActive('/candidat') ? 'text-brand-primary' : 'text-brand-dark hover:text-brand-primary'}`}
                    >
                        Mon Profil
                        <span className={`absolute bottom-0 left-0 h-0.5 bg-brand-primary transition-all ${isActive('/candidat') ? 'w-full' : 'w-0 group-hover:w-full'}`}></span>
                    </Link>
                </div>

                {/* ACTIONS */}
                <div className="hidden md:flex items-center gap-4">
                    {isLoggedIn ? (
                        <div className="flex items-center gap-4">
                            <span className="text-sm font-bold text-brand-secondary cursor-pointer hover:text-red-500 transition-colors" onClick={handleLogout}>
                                Se déconnecter
                            </span>
                            <div className="w-10 h-10 rounded-full bg-gradient-to-br from-brand-primary to-brand-accent flex items-center justify-center text-white font-bold shadow-lg shadow-brand-primary/20 cursor-pointer hover:shadow-xl transition-shadow">
                                OP
                            </div>
                        </div>
                    ) : (
                        <Link to="/login" className="px-5 py-2 rounded-full bg-brand-primary text-white font-bold text-sm hover:bg-orange-600 transition-all shadow-md hover:shadow-lg">
                            Se connecter
                        </Link>
                    )}
                </div>

                {/* MOBILE TOGGLE */}
                <button
                    className="md:hidden p-2 text-brand-dark"
                    onClick={() => setIsMenuOpen(!isMenuOpen)}
                >
                    <div className={`w-6 h-0.5 bg-current mb-1.5 transition-transform ${isMenuOpen ? 'rotate-45 translate-y-2' : ''}`}></div>
                    <div className={`w-6 h-0.5 bg-current mb-1.5 transition-opacity ${isMenuOpen ? 'opacity-0' : ''}`}></div>
                    <div className={`w-6 h-0.5 bg-current transition-transform ${isMenuOpen ? '-rotate-45 -translate-y-2' : ''}`}></div>
                </button>
            </div>

            {/* MOBILE MENU */}
            {isMenuOpen && (
                <div className="md:hidden bg-white border-b px-4 py-4 space-y-4 shadow-lg animate-fade-in">
                    <Link to="/missions" className="block py-2 text-brand-dark font-medium hover:text-brand-primary" onClick={() => setIsMenuOpen(false)}>Trouver une mission</Link>
                    <Link to="/candidat/profil" className="block py-2 text-brand-dark font-medium hover:text-brand-primary" onClick={() => setIsMenuOpen(false)}>Mon Profil</Link>
                    {isLoggedIn ? (
                        <button onClick={handleLogout} className="block w-full text-left py-2 text-red-500 font-medium">Se déconnecter</button>
                    ) : (
                        <Link to="/login" className="block py-2 text-brand-primary font-bold" onClick={() => setIsMenuOpen(false)}>Se connecter</Link>
                    )}
                </div>
            )}
        </nav>
    );
}
