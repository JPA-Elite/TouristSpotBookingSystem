import { Component, OnInit } from '@angular/core';
import { ArticleService } from '../services/article.service';

@Component({
  selector: 'app-articles',
  templateUrl: './articles.component.html',
  styleUrls: ['./articles.component.css']
})
export class ArticlesComponent implements OnInit {
  constructor(private articlesService: ArticleService){

  }
  customers : any;
  showCustomers(){
    this.customers = this.articlesService.listCustomers().subscribe(customer=>{
      this.customers = customer;
      console.log(this.customers);
    });
  }

  ngOnInit(): void {
      this.showCustomers();
     
  }
}
