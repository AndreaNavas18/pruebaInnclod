import React from 'react';
import ReactDOM from 'react-dom/client';

function Header() {

    const handleLogout = async () => {
        try {
            await axios.post('/logout'); 
            window.location.href = '/';
        } catch (error) {
            console.error('Error al cerrar sesióm:', error);
        }
    };
    return (
        <div className="h-container">
            <button onClick={handleLogout}>Cerrar sesión</button>
        </div>
    );
}
export default Header;

if (document.getElementById('header')) {
    const Index = ReactDOM.createRoot(document.getElementById("header"));

    Index.render(
        <React.StrictMode>
            <Header/>
        </React.StrictMode>
    )
}