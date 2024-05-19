import React from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import './bootstrap';
import Example from './components/Example';
import Login from './components/auth/Login';
import Dashboard from './components/Dashboard';
import CrearDocumento from './components/documentos/CrearDocumento';
import EditarDocumento from './components/documentos/EditarDocumento';

function App() {
    return (
        <Router>
            <Routes>
                <Route path="/" element={<Example />} />
                <Route path="/login" element={<Login />} />
                <Route path="/home" element={<Dashboard />} />
                <Route path="/crear-documento" element={<CrearDocumento />} />
                <Route path="/editar-documento/:id" element={<EditarDocumento />} />
            </Routes>
        </Router>
    );
}

export default App;

if (document.getElementById('app')) {
    const Index = ReactDOM.createRoot(document.getElementById("app"));

    Index.render(
        <App/>
    )
}
