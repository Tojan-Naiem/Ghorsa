

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


