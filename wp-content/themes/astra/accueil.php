<?php
/* Template Name: Accueil */
get_header(); ?>

<style>
*{
  margin: 0;
  padding: 0;
  font-family: "Open Sans", sans-serif;
  /* color:rgb(236, 228, 228); */
  box-sizing: border-box;
  }
  .body{
     
      overflow-x: hidden;
      
  }
  :root {
    --blue: #2a2185;
    --white: #fff;
    --gray: #f5f5f5;
    --black1: #222;
    --black2: #999;
    --header-height: 3.5rem;

}
.global{
  position: relative;
  top:0px;
}
.main--content{
width: 100vw;
height:70vh ;
display: flex;
justify-content: space-between;
/* align-items: center; */
position: relative;
top:0px;



}
.main--content img{
width:200%;
height: 390px;
position: relative;
left:600px;
top:0px;
}
.main--content .main--title {
font-size: large;
position: absolute;
font-size: 20px;
margin-left: 80px;
font-family: "Pacifico", cursive;
font-weight: 400;
font-style: normal;
color: #4F6F52;
margin-top: 50px;
margin-bottom: 20px;
line-height: 1;
}


/* """""""""""""""""""""""""""""""""""""""Descreption""""""""""""""""""""""""""""""""""""""" */
.section-padding {
padding-top: 20px; /* Ajustez cette valeur en fonction de la hauteur de votre header */
margin-top:0px;

}
.paragrapheContainer{
width:800px;
background-color:white;
height:300px;
margin: 80px auto;
margin-top:50px;
padding: 20px;
box-shadow: 0 7px 25px rgba(1, 50, 163, 0.08);
border-radius: 20px;
position: relative;
left:0;
}
.paragrapheContainer p{
font-size: 25px;
position: relative;
top:20px;
color:black ;
word-spacing: 10px;
text-align:center;

}
.paragrapheContainer h3{
text-align: center;
margin-bottom: 30px;
color:black;
}

  

</style>
<div class=global>
<div class="main--content">
    <div class="image-container">
        <img src="http://localhost/wordpress_giia/wp-content/uploads/2024/12/WhatsApp-Image-2024-12-05-a-00.08.02_768c5ecb.jpg" alt="image">
    </div>
    <div class="main--title">
        <h1>Bienvenue </h1>
        <h1>aux services des étudiants,</h1>
        <h1> votre espace dédié </h1>
        <h1> pour simplifier vos démarches.</h1>
    </div>
</div>

<div id="des" class="section-padding">
    <div class="paragrapheContainer">
        <h3>Description</h3>
        <p>
        Plateforme dédiée aux étudiants pour simplifier la gestion de leurs demandes de documents administratifs auprès du service de scolarité.
        </p>
    </div>
</div>
</div>

   
   

<?php get_footer(); ?>




