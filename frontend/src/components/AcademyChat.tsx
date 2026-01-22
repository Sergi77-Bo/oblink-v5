import { useState } from 'react';
import { API_URL } from '../config';

interface Message {
    id: number;
    text: string;
    sender: 'user' | 'bot';
}

export default function AcademyChat() {
    const [messages, setMessages] = useState<Message[]>([
        { id: 1, text: "Bonjour ! Je suis ton Professeur Virtuel OBLINK. Pose-moi une question sur tes cours (Optique Géométrique, Analyse Vision...)", sender: 'bot' }
    ]);
    const [input, setInput] = useState('');
    const [loading, setLoading] = useState(false);

    const sendMessage = async (e: React.FormEvent) => {
        e.preventDefault();
        if (!input.trim()) return;

        // 1. Ajoute le message de l'utilisateur
        const userMsg: Message = { id: Date.now(), text: input, sender: 'user' };
        setMessages(prev => [...prev, userMsg]);
        setInput('');
        setLoading(true);

        // 2. Appel API
        const token = localStorage.getItem('access_token');
        try {
            const res = await fetch(`${API_URL}/api/academy/chat/`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify({ message: userMsg.text })
            });

            const data = await res.json();

            // 3. Ajoute la réponse du bot
            const botMsg: Message = { id: Date.now() + 1, text: data.response || "Erreur de réponse", sender: 'bot' };
            setMessages(prev => [...prev, botMsg]);
        } catch (err) {
            const errorMsg: Message = { id: Date.now() + 1, text: "Je suis désconnecté (Erreur Serveur).", sender: 'bot' };
            setMessages(prev => [...prev, errorMsg]);
        } finally {
            setLoading(false);
        }
    };

    return (
        <div className="flex flex-col h-[600px] bg-white border border-gray-200 rounded-xl overflow-hidden shadow-2xl">
            {/* Header Chat */}
            <div className="bg-brand-dark text-white p-4 flex items-center gap-3 shadow-md z-10">
                <div className="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center font-bold shadow-lg animate-pulse-slow">IA</div>
                <div>
                    <h3 className="font-bold text-lg font-primary">Professeur OBLINK</h3>
                    <div className="flex items-center gap-1.5">
                        <span className="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                        <p className="text-xs text-brand-light/80 font-medium">En ligne • Module U4</p>
                    </div>
                </div>
            </div>

            {/* Zone Messages */}
            <div className="flex-1 overflow-y-auto p-4 space-y-4 bg-gray-50/50">
                {messages.map(msg => (
                    <div key={msg.id} className={`flex ${msg.sender === 'user' ? 'justify-end' : 'justify-start'}`}>
                        <div className={`max-w-[80%] p-4 rounded-2xl text-sm shadow-sm transition-all duration-300 ${msg.sender === 'user'
                            ? 'bg-brand-primary text-white rounded-br-none'
                            : 'bg-white text-gray-800 border border-gray-100 rounded-bl-none'
                            }`}>
                            <p className="whitespace-pre-wrap">{msg.text}</p>
                        </div>
                    </div>
                ))}
                {loading && (
                    <div className="flex justify-start animate-fade-in">
                        <div className="bg-white p-3 rounded-2xl rounded-bl-none border shadow-sm flex gap-1 items-center">
                            <span className="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style={{ animationDelay: '0ms' }}></span>
                            <span className="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style={{ animationDelay: '150ms' }}></span>
                            <span className="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style={{ animationDelay: '300ms' }}></span>
                        </div>
                    </div>
                )}
            </div>

            {/* Input Zone */}
            <form onSubmit={sendMessage} className="p-4 bg-white border-t border-gray-100 flex gap-3">
                <input
                    type="text"
                    value={input}
                    onChange={e => setInput(e.target.value)}
                    placeholder="Posez votre question d'optique..."
                    className="flex-1 bg-gray-100 border-transparent rounded-full px-5 py-3 focus:bg-white focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/20 outline-none transition-all placeholder:text-gray-400"
                />
                <button
                    type="submit"
                    disabled={loading || !input.trim()}
                    className="bg-brand-primary text-white rounded-full w-12 h-12 flex items-center justify-center font-bold hover:bg-orange-600 disabled:opacity-50 disabled:cursor-not-allowed transition transform hover:scale-105 shadow-md"
                >
                    <svg className="w-5 h-5 translate-x-0.5 translate-y-[-1px]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                </button>
            </form>
        </div>
    );
}
