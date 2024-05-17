import React from 'react';
import ReactDOM from 'react-dom/client';

function Dashboard() {
    return (
        <div className="ds-contenedor">
            <h1>Dashboard</h1>
            <div>
                <button>
                    Crear documento
                </button>
            </div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Contenido</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>Documento cualquiera</td>
                        <td>Contenido del documento</td>
                    </tbody>

                </table>
            </div>
        </div>
    );
}

export default Dashboard;

if (document.getElementById('dashboard')) {
    const Index = ReactDOM.createRoot(document.getElementById("dashboard"));

    Index.render(
        <React.StrictMode>
            <Dashboard/>
        </React.StrictMode>
    )
}