



let data=JSON.parse(localStorage.getItem('product'));
card=document.getElementById('card-product');
for(let i=0;i<data.length;i++){
    card.innerHTML+=`
      <div class="box"  onclick="goToPage(${i})">
                    <div class="img2">
                    

                        <img src="${data[i].image}" alt="${data[i].image}">
                   
                    <a href="" class="fa-regular fa-heart"></a>
                    </div>
                    <hr>
                 <div class="desc">
                    <div class="des">
                        <h5>${data[i].plantName}</h5>
                        <h6>${data[i].price}<strong>₪</strong></h6>
                    </div>
                    <div class="icon2">
                        <a href="#" >Add to Cart</a>
                        <a href="" style="padding-top: 3px;"  class="fa-solid fa-cart-shopping "></a>
                    </div>

                 </div>
                  

    
    `;
}

function goToPage(index) {
    let data = JSON.parse(localStorage.getItem('product'));
    console.log(data);
    localStorage.setItem('selectedPlant',JSON.stringify(data[index]))

    window.location.href = "index2.html";
    
    } 
