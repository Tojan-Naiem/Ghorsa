

image=document.getElementById('image');
plantName=document.getElementById('name');
category=document.getElementById('category');
color=document.getElementById('color');
price=document.getElementById('price');
descreption=document.getElementById('description');
plantCare=document.getElementById('plantCare');
submitBtn=document.getElementById('submit');

console.log(plantName.value);
console.log(color.value);
console.log(category.value);
console.log(plantCare.value);

let data;
if(localStorage.getItem('product')!=null){
    data=JSON.parse(localStorage.getItem('product'));
}
else data=[];

submitBtn.onclick=function(){
  let pro={
    plantName:plantName.value,
    image:image.value,
    category:category.value,
    color:color.value,
    price:price.value,
    descreption:descreption.value,
    plantCare:plantCare.value,
  }
  data.push(pro);
  localStorage.setItem('product',JSON.stringify(data));
  cleanData();

}
function cleanData(){
    plantName.value='';
    image.value='';
    category.value='';
    color.value='';
    price.value='';
    descreption.value='';
    plantCare.value='';
}


//show data
// product=document.getElementById('products-admin');

// for(var i=0;i<data.length;i++){
// product.innerHTML+=`
// <div class="product-card">
//                     <div class="product-details">

//                         <img src="2.png" alt="Plant" class="product-img">


//                         <div class="product-info">
//                             <h4 class="fw-bold">Wild Session Plant <span class="text-success fs-6">35₪</span></h4>
//                             <p>Quantity Available: <strong>100</strong></p>
//                             <p>Category: <strong>CategoryName</strong></p>
//                             <p>Color Of Pot Available: <strong>Blue</strong></p>
//                             <p id="mainDescription">
//                                 Description: Pothos plant in an orange ceramic pot inside an elegant holder...
//                             </p>
//                         </div>
//                     </div>


//                     <div class="expand-icon" id="expandIcon">
//                         <i class="fa fa-chevron-down"></i>
//                     </div>


//                     <div class="extra-info" id="extraInfo">
//                         <p id="extraDescription ">
//                             <strong> Description:</strong> Pothos plant in an orange ceramic pot inside an elegant
//                             holder with an autumn theme design An ideal gift for the fall season
//                         <p>stronfices.</p>
//                         <p> The height of the holder is 34 cm.
//                             <br>The width of the holder is 12 cm.
//                         </p>
//                         </p>

//                         <ul>
//                             <strong> How to care:</strong> Pothos plant in an orange ceramic pot inside an elegant
//                             holder with an autumn theme design An ideal gift for the fall season
//                             <li>stronfices.</li>
//                             <li>Holder height: 34 cm.</li>
//                             <li>Holder width: 12 cm.</li>
//                         </ul>
//                     </div>
//                 </div>



// `
// }