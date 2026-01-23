import { Link, useLocation } from 'react-router-dom';
import { useState, useRef, useEffect } from 'react';
import { useAuth } from '../context/AuthContext';
import { Menu, X, LogOut, User as UserIcon, Settings, ChevronDown } from 'lucide-react';
import { motion, AnimatePresence } from 'framer-motion';

export default function Navbar() {
    const [isMenuOpen, setIsMenuOpen] = useState(false);
    const [isProfileOpen, setIsProfileOpen] = useState(false);
    const location = useLocation();
    const { user, logout, isAuthenticated } = useAuth();
    const profileRef = useRef<HTMLDivElement>(null);

    useEffect(() => {
        function handleClickOutside(event: MouseEvent) {
            if (profileRef.current && !profileRef.current.contains(event.target as Node)) {
                setIsProfileOpen(false);
            }
        }
        document.addEventListener("mousedown", handleClickOutside);
        return () => document.removeEventListener("mousedown", handleClickOutside);
    }, []);

    const isActive = (path: string) => location.pathname.startsWith(path);

    // Get initials or fallback
    const initials = user?.firstName
        ? `${user.firstName[0]}${user.lastName?.[0] || ''}`.toUpperCase()
        : 'OP';

    return (
        <nav className="bg-white/80 backdrop-blur-xl border-b border-white/20 sticky top-0 z-50 shadow-sm transition-all">
            <div className="container mx-auto px-4 h-20 flex items-center justify-between">
                {/* LOGO */}
                <Link to="/" className="font-primary text-2xl font-extrabold tracking-tight text-brand-dark hover:opacity-80 transition-opacity flex items-center gap-2">
                    OBLINK<span className="text-brand-primary">.</span>
                </Link>

                {/* DESKTOP MENU */}
                <div className="hidden md:flex items-center gap-8">
                    <NavLink to="/missions" active={isActive('/missions')}>Trouver une mission</NavLink>
                    <NavLink to="/candidat/profil" active={isActive('/candidat')}>Mon Profil</NavLink>
                </div>

                {/* ACTIONS */}
                <div className="hidden md:flex items-center gap-4">
                    {isAuthenticated ? (
                        <div className="relative" ref={profileRef}>
                            <button
                                onClick={() => setIsProfileOpen(!isProfileOpen)}
                                className="flex items-center gap-3 pl-2 pr-1 py-1 rounded-full hover:bg-gray-100/50 transition-colors border border-transparent hover:border-gray-200"
                            >
                                <div className="text-right hidden lg:block">
                                    <p className="text-sm font-bold text-gray-900 leading-none">{user?.firstName}</p>
                                    <p className="text-xs text-gray-500 font-medium">{user?.groups?.includes(1) ? 'Recruteur' : 'Candidat'}</p>
                                </div>
                                <div className="w-10 h-10 rounded-full bg-gradient-to-br from-brand-primary to-brand-accent flex items-center justify-center text-white font-bold shadow-lg shadow-brand-primary/20">
                                    {initials}
                                </div>
                                <ChevronDown className={`w-4 h-4 text-gray-400 transition-transform ${isProfileOpen ? 'rotate-180' : ''}`} />
                            </button>

                            {/* DROPDOWN MENU */}
                            <AnimatePresence>
                                {isProfileOpen && (
                                    <motion.div
                                        initial={{ opacity: 0, y: 10, scale: 0.95 }}
                                        animate={{ opacity: 1, y: 0, scale: 1 }}
                                        exit={{ opacity: 0, y: 10, scale: 0.95 }}
                                        transition={{ duration: 0.1 }}
                                        className="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-2xl border border-gray-100 py-2 overflow-hidden"
                                    >
                                        <div className="px-4 py-3 border-b border-gray-100 md:hidden">
                                            <p className="text-sm font-bold text-gray-900">{user?.firstName} {user?.lastName}</p>
                                            <p className="text-xs text-gray-500 truncate">{user?.email}</p>
                                        </div>

                                        <DropdownItem to="/candidat/profil" icon={UserIcon} label="Mon Profil" onClick={() => setIsProfileOpen(false)} />
                                        <DropdownItem to="/candidat/dashboard" icon={Settings} label="Tableau de bord" onClick={() => setIsProfileOpen(false)} />

                                        <div className="border-t border-gray-100 my-1"></div>

                                        <button
                                            onClick={() => { logout(); setIsProfileOpen(false); }}
                                            className="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 flex items-center gap-2 transition-colors"
                                        >
                                            <LogOut className="w-4 h-4" />
                                            Se déconnecter
                                        </button>
                                    </motion.div>
                                )}
                            </AnimatePresence>
                        </div>
                    ) : (
                        <Link to="/login" className="px-5 py-2.5 rounded-xl bg-brand-dark text-white font-bold text-sm hover:bg-brand-primary transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                            Se connecter
                        </Link>
                    )}
                </div>

                {/* MOBILE TOGGLE */}
                <button
                    className="md:hidden p-2 text-brand-dark rounded-lg hover:bg-gray-100 transition-colors"
                    onClick={() => setIsMenuOpen(!isMenuOpen)}
                >
                    {isMenuOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
                </button>
            </div>

            {/* MOBILE MENU */}
            <AnimatePresence>
                {isMenuOpen && (
                    <motion.div
                        initial={{ height: 0, opacity: 0 }}
                        animate={{ height: 'auto', opacity: 1 }}
                        exit={{ height: 0, opacity: 0 }}
                        className="md:hidden bg-white/95 backdrop-blur-xl border-b border-gray-100 overflow-hidden"
                    >
                        <div className="px-4 py-6 space-y-4">
                            <Link to="/missions" className="block py-2 text-lg font-bold text-brand-dark" onClick={() => setIsMenuOpen(false)}>Trouver une mission</Link>
                            <Link to="/candidat/profil" className="block py-2 text-lg font-bold text-brand-dark" onClick={() => setIsMenuOpen(false)}>Mon Profil</Link>
                            <div className="border-t border-gray-100 pt-4">
                                {isAuthenticated ? (
                                    <button onClick={() => { logout(); setIsMenuOpen(false); }} className="flex items-center gap-2 text-red-500 font-bold">
                                        <LogOut className="w-5 h-5" /> Se déconnecter
                                    </button>
                                ) : (
                                    <Link to="/login" className="block w-full text-center py-3 bg-brand-primary text-white rounded-xl font-bold" onClick={() => setIsMenuOpen(false)}>
                                        Se connecter
                                    </Link>
                                )}
                            </div>
                        </div>
                    </motion.div>
                )}
            </AnimatePresence>
        </nav>
    );
}

function NavLink({ to, children, active }: { to: string, children: React.ReactNode, active: boolean }) {
    return (
        <Link to={to} className={`font-medium transition-colors relative group ${active ? 'text-brand-primary' : 'text-brand-dark hover:text-brand-primary'}`}>
            {children}
            <span className={`absolute -bottom-1 left-0 h-0.5 bg-brand-primary transition-all duration-300 ${active ? 'w-full' : 'w-0 group-hover:w-full'}`}></span>
        </Link>
    );
}

function DropdownItem({ to, icon: Icon, label, onClick }: { to: string, icon: any, label: string, onClick: () => void }) {
    return (
        <Link to={to} onClick={onClick} className="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-brand-primary transition-colors">
            <Icon className="w-4 h-4" />
            {label}
        </Link>
    );
}
