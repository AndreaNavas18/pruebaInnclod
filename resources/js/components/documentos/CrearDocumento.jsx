import React from 'react';
import ReactDOM from 'react-dom/client';

function CrearDocumento() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>

                        <div className="card-body">I'm an example component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default CrearDocumento;

if (document.getElementById('crear-documento')) {
    const Index = ReactDOM.createRoot(document.getElementById("crear-documento"));

    Index.render(
        <React.StrictMode>
            <CrearDocumento/>
        </React.StrictMode>
    )
}
