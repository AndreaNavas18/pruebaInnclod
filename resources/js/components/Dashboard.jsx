import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';

function Dashboard() {
    const [documentos, setDocumentos] = useState([]);

    useEffect(() => {
        async function fetchD(){
            try {
                const response = await axios.get('/documentos');
                setDocumentos(response.data);
            } catch (error) {
                console.log(error);
            }
        }
        fetchD();
    }, []);
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const eliminarDocumento = async (id) => {
        try {
            await axios.delete(`/eliminar-documento/${id}`, {
                headers: {
                    'X-CSRF-TOKEN': token,
                }
            });
            setDocumentos(prevDocumentos => prevDocumentos.filter(doc => doc.doc_id !== id));
        } catch (error) {
            console.error('Error al eliminar el documento:', error);
        }
    };

    const tdAction = {
        display: 'flex',
        justifyContent: 'space-around',
        alignItems: 'center',
    };

    return (
        <div className="ds-contenedor">
            <h1>Prueba técnica Innclod</h1>
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
                            <td style={tdAction}>
                                <Link to={`/editar-documento/${documento.doc_id}`} className='btnLateral'>Editar</Link>
                                <button onClick={() => eliminarDocumento(documento.doc_id)} className='btnEliminar'>Eliminar</button>
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
