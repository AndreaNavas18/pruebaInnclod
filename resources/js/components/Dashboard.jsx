import React, { useEffect } from 'react';
import { Link } from 'react-router-dom';

function Dashboard() {
    const documentos = window.documentos || [];

    return (
        <div className="ds-contenedor">
            <h1>Dashboard</h1>
            <div className='ds-divP'>
                <Link className='ds-crear' to="/crear-documento">
                Crear documento
                </Link>
            </div>
            <div className='ds-tabla'>
            {documentos.length === 0 ? ( 
                <p>No hay documentos</p>
            ) : (
                <table>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Contenido</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    {documentos.map(documento => (
                        <tr key={documento.doc_id}>
                            <td>{documento.doc_codigo}</td>
                            <td>{documento.doc_nombre}</td>
                            <td>{documento.doc_contenido}</td>
                            <td>
                                <Link to={`/editar-documento/${documento.doc_id}`} className='btnLateral'>Editar</Link>
                                {/* <Link to={`/eliminar-documento/${documento.doc_id}`}>Eliminar</Link> */}
                            </td>
                        </tr>
                    
                    ))}
                    </tbody>

                </table>
            )}
            </div>
        </div>
    );
}

export default Dashboard;
