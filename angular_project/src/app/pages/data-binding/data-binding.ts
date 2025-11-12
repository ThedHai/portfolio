import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-data-binding',
  imports: [FormsModule],
  templateUrl: './data-binding.html',
  styleUrl: './data-binding.css',
})
export class DataBinding {
  studentName: string ="John Doe";
  currentCourse="English 101";//type inferance
  isActive: boolean=false;

  marks = 45;
  marksClass="pass";

inputType="checkbox";

  constructor(){
    if(this.marks < 50){
      this.marksClass="fail";
    }else{
      this.marksClass="pass";
    }
  }

  showAlert(){
    alert(" Welcome to English 101")
  }
  changeCurrentCourse(courseName: string){
    debugger; //stack -> pause and test variables
    this.currentCourse=courseName ;
  }
}
