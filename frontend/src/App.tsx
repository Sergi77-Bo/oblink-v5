import { BrowserRouter as Router, Routes, Route, Navigate } from 'react-router-dom';
import Navbar from './components/Navbar';
import MissionList from './components/MissionList';
import MissionDetail from './components/MissionDetail';
import CandidateProfilePage from './pages/CandidateProfile';
import CandidateDashboard from './components/CandidateDashboard';
import AcademyPage from './pages/Academy';
import RecruiterDashboard from './components/RecruiterDashboard';
import CreateMission from './pages/CreateMission';
import RevenueSimulator from './pages/RevenueSimulator';
import ContractTool from './components/ContractTool';
import Login from './pages/Login';

function App() {
  return (
    <Router>
      <div className="min-h-screen bg-brand-light font-secondary text-brand-dark">
        {/* La Navbar s'affiche sur toutes les pages */}
        <Navbar />

        <main className="container mx-auto px-4 py-8 max-w-7xl">
          <Routes>
            {/* Redirection de l'accueil vers les missions pour l'instant */}
            <Route path="/" element={<Navigate to="/missions" replace />} />

            {/* Les vraies pages */}
            <Route path="/missions" element={
              <div className="animate-fade-in-up">
                <div className="mb-8 text-center">
                  <h2 className="text-3xl font-bold font-primary text-brand-dark mb-2">Offres d'emploi récentes</h2>
                  <p className="text-gray-500">Trouvez votre prochaine mission en optique.</p>
                </div>
                <MissionList />
              </div>
            } />

            <Route path="/missions/:id" element={<MissionDetail />} />
            <Route path="/candidat/profil" element={<CandidateProfilePage />} />
            <Route path="/candidat/dashboard" element={<CandidateDashboard />} />
            <Route path="/recruteur/dashboard" element={<RecruiterDashboard />} />
            <Route path="/recruteur/new" element={<CreateMission />} />
            <Route path="/tools/simulateur" element={<RevenueSimulator />} />
            <Route path="/tools/contrat" element={<ContractTool />} />
            <Route path="/academy" element={<AcademyPage />} />
            <Route path="/login" element={<Login />} />

            {/* Page 404 simple */}
            <Route path="*" element={<div className="p-20 text-center text-xl text-gray-500">Page introuvable (404)</div>} />
          </Routes>
        </main>
      </div>
    </Router>
  );
}

export default App;
