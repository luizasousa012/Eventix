<style>

body {
    font-family: Arial;
    background: linear-gradient(135deg, #f3e8ff, #ffffff);
    margin: 0;
}

/* CONTAINER */
.container {
    width: 90%;
    max-width: 900px;
    margin: 40px auto;
}

/* TOPO */
.topo {
    background: #6a0dad;
 
    text-align: center;
}

/* LOGO */
.logo {
    height: 250px;
    animation: logoEntrada 0.8s ease;
    transition: 0.3s;
}
.logo:hover {
    transform: scale(1.1) rotate(2deg);
}

/* ANIMAÇÃO LOGO */
@keyframes logoEntrada {
    0% {
        opacity: 0;
        transform: scale(0.7) translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}

/* CARD */
.card {
    background: white;
    padding: 20px;
    border-radius: 12px;
    margin-top: 20px;
    animation: fadeIn 0.5s ease;
}

/* CARD PEQUENO */
.card-pequeno {
    max-width: 400px;
    margin: 40px auto;
}

/* INPUTS */
input, textarea {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 14px;
}

/* BOTÃO */
button {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background: #6a0dad;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #5800a3;
    transform: scale(1.03);
}

/* ANIMAÇÃO CARD */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(15px); }
    to { opacity: 1; transform: translateY(0); }
}

.center {
    text-align: center;
}

/* RESPONSIVO */
@media (max-width: 600px) {
    .card-pequeno {
        max-width: 90%;
    }
}

</style>