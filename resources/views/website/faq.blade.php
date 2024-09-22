  <!DOCTYPE html>
  <html>
  <head>
      <title>FAQ</title>
      <style type="text/css">
 :root {
    
    /* colors */
    --purple: #7276e1;
    --orange: hsl(14, 88%, 65%);
    --blue-dark: hsl(238, 29%, 16%);
    --grey-light: hsl(237, 12%, 33%);
    --blue-mid: hsl(240, 6%, 50%);

    /* fonts */
    --font: 'Kumbh Sans', sans-serif;
    --base-font-size: 1.2rem;

}

.attribution { 
    color: #fff;
    font-size: 11px; 
    margin-top: 25px;
    text-align: center;  
}

.attribution a { color:#fff; }

* { box-sizing: border-box; }

html {
    font-size: 10px;
}

body { 
    align-items: center;
    background-image: linear-gradient(-180deg, hsl(36deg 75% 66%),hsl(39deg 84% 59%)); 
    display: flex;
    flex-direction: column;
    font-family: var(--font);
    font-weight: 400;
    height: 100vh;
    justify-content: center;
    padding: 0;
}

.faq { 
    background-color: #fff;
    border-radius: 25px;
    padding: 50px 25px;
    margin: 150px 5% 5% 5%;
    min-width: 320px;
    max-width: 320px;
}

.faq__logo {
    background: url('https://bobmatyas.github.io/fm-faq-accordion/images/bg-pattern-mobile.svg') center bottom no-repeat;
    background-color: transparent;
    margin: 0 auto;
    max-width: 300px;
    padding: 0;
    margin-top: -157px;
}

.faq__logo__image {
    margin-left: -13px;
    margin-bottom: 13px;
}

.faq__heading { 
    color: var(--blue-dark);
    font-size: 3.2rem;
    font-weight: 700;
    text-align: center; 
}

.faq__detail {
    border-bottom: 1px solid hsl(240, 5%, 91%);
    margin: 20px 0 0 0;
    padding: 5px 0 20px 0;
}

.faq__summary:hover,
.faq__summary:active { 
    color: var(--orange);
    cursor: pointer; 
}

.faq__detail[open] > .faq__summary { 
    font-weight: 700; 
}

.faq__summary {
    list-style: none;
  }

.faq__summary::-webkit-details-marker {
    display: none;
  }

.faq__summary { 
    display: block;
    padding: 0;
    position: relative;
    text-align: right;
}

    
.faq__summary:after {
    display: inline-block;
    content: url("https://bobmatyas.github.io/fm-faq-accordion/images/icon-arrow-down.svg");
    background-repeat: no-repeat;
    background-position: right center;
    text-align: right;
    padding-bottom: 20px;
  }
  
details[open] .faq__summary:after {
    display: inline-block;
    width: 18px;
    height: 10px;
    content: "";
    background-image: url("https://bobmatyas.github.io/fm-faq-accordion/images/icon-arrow-down.svg");
    background-repeat: no-repeat;
    background-position: center right;
    transform:scaleY(-1);
}
  

.faq__question {
    left: 0;
    position: absolute;
    text-align: left;
    top: 0;
    width: 90%;
}

.faq__question {
    display: inline-block;
    margin: 5px 0;
    text-align: left;
    width: 90%;
}

.faq__summary {
    color: var(--blue-dark);
    font-size: 1.4rem; 
}

.faq__summary:focus {
    color: var(--orange); 
    font-weight: bold;
    outline: none;
}

.faq__text {
    color: var(--blue-mid);
    font-size: var(--base-font-size);
    line-height: 1.6;
    margin: 10px 0 0 0;
}

.hidden-lg { display: block; }
    
.visible-lg { display: none; }


@media (min-width: 900px) {
    .faq {
        align-items: center;
        display: flex;
        justify-content: space-between;
        min-width: 900px;
        padding: 0;
        margin: 0;
    }

    .faq__logo__holder { 
        display: flex;
        align-items: center;
        height: 100%;
        justify-content: center;
    }

    .faq__holder {
        margin: 0 50px;
        padding: 70px 0;
        max-width: 350px;
        width: 350px;
    }

    .faq__logo {
        display: flex;
        align-items: center;
        background-image: url(https://bobmatyas.github.io/fm-faq-accordion/images/illustration-woman-online-desktop.svg), url(https://bobmatyas.github.io/fm-faq-accordion/images/bg-pattern-desktop.svg);
        background-position: -75px center, -571px -270px;
        background-size: 100%, 200%;
        height: 100%;
        min-width: 300px;
        margin: 0;
        padding: 0;
        width: 525px;
        max-width: 500px;
        position: relative;
    }

    .faq__heading {
        text-align: left;
    }

    .hidden-lg { display: none; }

    .visible-lg { 
        display: block; 
        position: absolute;
        margin-top: 120px;
        left: -80px;    
    }

    .faq__text {
        margin: 0 0 10px 0;
    }

    .faq__detail {
        margin: 10px 0 0 0 0;
        padding: 0;
    }
}   
  </style>
  </head>
  <body>
<main class="faq">
  <div class="faq__logo__holder">
  <div class="faq__logo">
    <img src="https://bobmatyas.github.io/fm-faq-accordion/images/illustration-woman-online-mobile.svg" alt="woman at a computer" class="faq__logo__image hidden-lg">
    <img src="https://bobmatyas.github.io/fm-faq-accordion/images/illustration-box-desktop.svg" alt="" class="faq__logo__image visible-lg">
  </div>
  </div>
  
  <div class="faq__holder">
  <h1 class="faq__heading">FAQ</h1>
 
  <details class="faq__detail">
      <summary  class="faq__summary"><span class="faq__question">How many team members can I invite?</span></summary>
      <p class="faq__text">You can invite up to 2 additional users on the Free plan. There is no limit on team members for the Premium plan.</p>
  </details>

  <details class="faq__detail">
    <summary  class="faq__summary"><span class="faq__question">What is the maximum file upload size?</span></summary>
    <p class="faq__text">No more than 2GB. All files in your account must fit your allotted storage space.</p>
  </details>  

  <details class="faq__detail">
    <summary  class="faq__summary"><span class="faq__question">How do I reset my password?</span></summary>
    <p class="faq__text">Click “Forgot password” from the login page or “Change password” from your profile page.</p>
    <p class="faq__text">A reset link will be emailed to you.</p>
  </details>  
  
  <details class="faq__detail">
    <summary  class="faq__summary"><span class="faq__question">Can I cancel my subscription?</span></summary>
    <p class="faq__text">Yes! Send us a message and we’ll process your request no questions asked.</p>
  </details> 
  
  <details class="faq__detail">
    <summary  class="faq__summary"><span class="faq__question">Do you provide additional support?</span></summary>
    <p class="faq__text">Chat and email support is available 24/7. Phone lines are open during normal business hours.</p>
  </details>   

</div>
</main> 
  </body>
  </html>