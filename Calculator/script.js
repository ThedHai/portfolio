                                    /* -------------

                                    Calulator Project
                                    project 001
                                    *------------ */



//------> Creating a class calculator that takes previous operand, current operand and perform operations with them based on chosen operation
class Calculator{
    //constructor to keep track of default, previous(result), and current operand  elements
    constructor(prevOperandTextElement, curOperandTextElement){ //constructor to define current and previous operand
        this.prevOperandTextElement = prevOperandTextElement
        this.curOperandTextElement = curOperandTextElement
    }

    clear(){//function to clear screen of all input
    
        this.curOperand = '';
         //emptying or allocation empry string to current operand
        this.prevOperand = '';//emptying or allocation empry string to previous operand
        this.operation = undefined; // Because there should not be an operation here already if we just cleared the screen
        
    }

    del(){
        this.curOperand = this.curOperand.toString().slice(0,-1); 
        this.updateDisplay()
    }

    appendNumber(number){//function to append a number to current operand
        if (number == '.' && this.curOperand.includes('.')) return //stops function from adding more than one period in an operand
        this.curOperand = this.curOperand.toString() + number.toString()//manually appending new number clicked to current operand
        
    }
    chooseOperation(operation){ //choosing the operation to perform computation
        if(this.curOperand == '') return // making sure that a number must be typed before clicking an operand
        if(this.prevOperand !== ''){//if the prev and current operand was already a number, once new operation is clicked, compute the result into previous operand (call compute)
            this.compute()
        }

        this.operation = operation // else: assigning the operation clicked as the object's operation
        this.prevOperand = this.curOperand //once an operation is chosen, automatically put the current operand as the previous
        this.curOperand = '' //clear the current for next operand
    }
    compute(){//compute values for operation
        let computation
        const prev = parseFloat(this.prevOperand) // converting previous to a  number
        const cur = parseFloat(this.curOperand) //converting current to a number
        if(isNaN(prev) || isNaN(cur)) return // kill function is they aren't numbers

        switch(this.operation){ //computing the operations based on the valued of "operation"
            case '+': 
                computation = prev + cur 
                break
            case '*':
                computation = prev * cur
                break
            case '÷': 
                computation = prev / cur 
                break
            case '-':
                computation = prev - cur
                break
            default: //invalid operation
                return

        }
        this.curOperand = computation
        this.operation = undefined
        this.prevOperand = ''

    }
    formatDisplayNumber(number){
        

       const stringNum = number.toString()
       const integerNum = parseFloat(stringNum.split('.')[0])
       const floatNum = stringNum.split('.')[1]

       let displayInt 
       let displayFloat
       
       if (isNaN(integerNum)) { // get the interger part from the string: either empty string or an actual number
            displayInt = ''
        }else{
            displayInt = integerNum.toLocaleString('en',{  //in the english display format (comma)
                maximumFractionDigits:0 //no more zeros after last digit
            })
        }
        if(floatNum != null){  //get full float number is there're decimal part involved and send it back formatted in number/fraction form
            return `${displayInt}.${floatNum}` //returning string interpolation indise a template literal...(formating strings with variables placed inside)
        }else{  //if there's no decimal part, just return the integer part 
            return displayInt
        }
    }
    updateDisplay(){//update display after every operation
        this.curOperandTextElement.innerText = this.formatDisplayNumber(this.curOperand); //update the display by (converting it to Local English strin (comma deliminer)) writing over new current operand
        this.prevOperandTextElement.innerText = this.formatDisplayNumber(this.prevOperand); //update the display by writing over prev operand
    }
}



//------------------------- getting data-attributes from html --------------|
const numberButtons = document.querySelectorAll('[data-num]')
const operationButtons = document.querySelectorAll('[data-operation]')

document.querySelector('[data-equal]').addEventListener("click", Eq);
document.querySelector('[data-del]').addEventListener("click", Del);

const prevOperandTextElement = document.querySelector('[data-prev]')
const curOperandTextElement = document.querySelector('[data-cur]')
    
document.querySelector('[data-AC]').addEventListener("click", AC);



//------------ Helper functions outside class --------------------------------|
const calculator = new Calculator(prevOperandTextElement, curOperandTextElement)
calculator.clear();
var  i;

for (i = 0; i < numberButtons.length; i++) { //coloring operation buttons purple
    numberButtons[i].style.backgroundColor = "purple";
}

for (i = 0; i < operationButtons.length; i++) {//coloring operation buttons yellow
    operationButtons[i].style.backgroundColor = "yellow";
}



numberButtons.forEach(buttonFunction =>{//parse the numbers clicked by an event listener (everytime a number,including '.' is clicked call append and call update.)
    buttonFunction.addEventListener('click',function(){
        calculator.appendNumber(buttonFunction.innerText)
        calculator.updateDisplay()

    } )
}
)

operationButtons.forEach(buttonFunction =>{ //parse the operations clicked by an event
    buttonFunction.addEventListener('click',function(){
        calculator.chooseOperation(buttonFunction.innerText)
        calculator.updateDisplay()
    } )
}

)

function Eq() { //Once '=' is clicked, compute operation and update the display(show result)
    calculator.compute();
    calculator.updateDisplay();
  }

  function AC() {calculator.clear();calculator.updateDisplay()}// clear calculator

  function Del() {calculator.del();} //delete last number

  