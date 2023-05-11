
 // Import the functions you need from the SDKs you need
 import { initializeApp } from "https://www.gstatic.com/firebasejs/9.20.0/firebase-app.js";
 import { getAuth } from "https://www.gstatic.com/firebasejs/9.20.0/firebase-auth.js"
 import { getFirestore } from "https://www.gstatic.com/firebasejs/9.20.0/firebase-firestore.js"
 // TODO: Add SDKs for Firebase products that you want to use
 // https://firebase.google.com/docs/web/setup#available-libraries


 // Your web app's Firebase configuration
 const firebaseConfig = {
   apiKey: "AIzaSyAiVhUnLyyADG4N6jo6h20R-GKn4nOYlz0",
   authDomain: "fir-app-29154.firebaseapp.com",
   projectId: "fir-app-29154",
   storageBucket: "fir-app-29154.appspot.com",
   messagingSenderId: "981825413212",
   appId: "1:981825413212:web:e99697817d65f2dfa50699"
 };

 // Initialize Firebase
 export const app = initializeApp(firebaseConfig);
 export const auth = getAuth(app)
 export const db = getFirestore(app)