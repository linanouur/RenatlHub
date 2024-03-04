 //  property form validation 
 document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('form1'); 
    small = document.querySelector("small");

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // prevents the form from submitting normally

      
        if (validateForm()) {
            const section = document.getElementById('posting-procedure');
            section.scrollIntoView({ behavior: 'smooth' });
        } else {
            
            console.log('Form validation failed');
        }
    });  
    const setError = (element, message) => {
        
        const errorDisplay =document.getElementById(`${element.id}-error`);
        errorDisplay.innerText=message ; 
    
         element.classList.add('error'); 
         element.classList.remove('sucess'); 
        
    } 
    const setSuccess = element => { 
       
        let errorDisplay =document.getElementById(`${element.id}-error`)
        errorDisplay.innerText="" ; 
    
         element.classList.add('error'); 
         element.classList.remove('sucess'); 
        
    }

    function validateForm() {
        
        const Namevalue = document.getElementById('name').value.trim();  
        const StateValue =document.getElementById('state').value.trim();  
        const TownValue =document.getElementById('town').value.trim();  
        const AddressValue =document.getElementById('address').value.trim();  
        const PriceValue =document.getElementById('price').value.trim();  
        const CategoryValue =document.getElementById('category').value.trim(); 


       
        if(Namevalue === '' || StateValue ==='' || TownValue ==='' ||AddressValue ==='' || PriceValue ==='' ||CategoryValue ==='')
          
        { 
            if (Namevalue === '' ) {
            setError(document.getElementById('name'),'property name Is required')
          
            
                
        }  
        else { 
            setSuccess(document.getElementById('name'))
        } 
        if (StateValue ==='') 
        {   setError(document.getElementById('state'),'state Is required')
           
        }   
        else { setSuccess(document.getElementById('state'))}
        if (TownValue ==='') 
        {   setError(document.getElementById('town'),'town Is required')
            
        }   
        else { setSuccess(document.getElementById('town'))}
        if (AddressValue ==='') 
        {   setError(document.getElementById('address'), 'address Is required')
            
        }   
        else { setSuccess(document.getElementById('address'))}
        if (PriceValue ==='') 
        {   setError(document.getElementById('price'), 'Price Is required')
           
        }   
        else {  if ( PriceValue < 0 ) {
            setError(document.getElementById('price'), 'enter positive value') } 
            else {
            setSuccess(document.getElementById('price')) } }
        if (CategoryValue ==='') 
        {   setError(document.getElementById('category'), 'Category Is required')
          
        }  
        else { setSuccess(document.getElementById('category'))} 

     return false; 
    }
        
     else 
        return true;  
}
});  
//chechbox validation 
document.addEventListener('DOMContentLoaded', function() {
    const validateButton = document.getElementById('validateButton');
    const myForm = document.getElementById('checkboxForm');

    if (validateButton && myForm) {
        validateButton.addEventListener('click', function(event) {
            event.preventDefault(); 

            const checkboxes = document.querySelectorAll('input[name="checkboxGroup"]:checked');
            
            if (checkboxes.length === 0) {
                alert('Please select at least one option.');
                
                return false;
            }
           
            console.log('Form validation succeeded!');
        }); 

    } else {
        console.error('element not found');
    } 
    validateButton.addEventListener('submit', function(event) {
        event.preventDefault(); 

    
        if (validateButton && myForm) {
            
            window.location.href = "http://172.20.10.2:5503/newprofile.html#posts"; 
        } 
    })
});   
//date validation
document.addEventListener('DOMContentLoaded', function() { 
    const myform2=document.getElementById('form2');
let check_in = document.getElementById('from');
let check_out = document.getElementById('to');

if (validateButton && myform2) {
let SubmitBtn = document.querySelector(".reserve-btn");

SubmitBtn.addEventListener("click", (event) => {
    event.preventDefault();
    checkInputs();
});
let error_Message = '';

function checkInputs() {
  
    const check_inValue = check_in.value.trim();
    const check_outValue = check_out.value.trim();
    


    if ( check_inValue === '' ||  check_outValue === '') {
        alert("You must fill check in and check out dates");
    } else {
        if (check_inValue != "") {
            isValidateDateIn(check_inValue);
        }
        if (check_outValue != "") {
            isValidateDateOut(check_inValue,check_outValue);
        }
        
    }
    if (error_Message !== '') {
        alert(error_Message);
        error_Message='';
    }
}

let currentDate = Date.now();

function isValidateDateIn(e) {
    const inputDate = new Date(e);
    if (inputDate < currentDate) {
        error_Message += "  no valid Check in date, please enter a valid date ";
    }
}

function isValidateDateOut(f,e) {
    const inputDate = new Date(f); 
    const outputDate =new Date (e);
    if ( outputDate < inputDate ) {
        error_Message += "  no valid Check out date";
    }
}  
}
});  
//calendar limitation
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 3
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
   //show all equipements 
   document.addEventListener('DOMContentLoaded', function() {
    const showEquipmentsBtn = document.getElementById('showEquipmentsBtn');
    const equipementsList = document.querySelector('.equipements-list');

    showEquipmentsBtn.addEventListener('click', function() {
        equipementsList.classList.toggle('show-all');
        if (equipementsList.classList.contains('show-all')) {
            showEquipmentsBtn.textContent = 'Hide equipements';
        } else {
            showEquipmentsBtn.textContent = 'Show all equipements';
        }
    });
});
  