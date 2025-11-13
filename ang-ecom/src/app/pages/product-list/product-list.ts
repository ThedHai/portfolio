import { Component, signal } from '@angular/core';
import { Product } from '../../models/products.moldels';
import { ProductCard } from "./product-card/product-card";

@Component({
  selector: 'app-product-list',
  imports: [ProductCard],
  template: `
    <div class="p-8 grid grid-cols-3 gap-1">
      @for (prod of products(); track prod.id) {
        <app-product-card [product]="prod"/>
      }
    </div>
  `,
  styles: ``,
})
export class ProductList {
  products = signal<Product[]>([
    {
      id: 1,
      title: 'ipad',
      price: 700,
      image: 'https://www.shutterstock.com/image-photo/varna-bulgaria-february-02-2014-600nw-255862375.jpg',
      stock: 10 
    },
    {
      id: 2,
      title: 'iphone 17',
      price: 1300,
      image: 'https://www.visible.com/shop/assets/images/shop/iPhone_17_Pro_Max_COS_1.jpg',
      stock: 0
    },
    {
      id: 3,
      title: 'Macbook Air',
      price: 1500,
      image: 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/mba13-skyblue-select-202503?wid=892&hei=820&fmt=jpeg&qlt=90&.v=M2RyY09CWXlTQUp1KzEveHR6VXNxcTQ1bzN1SitYTU83Mm9wbk1xa1lWN2h4SGtCQ2R3aStVaDRhL2VUV1NjdkJkRlpCNVhYU3AwTldRQldlSnpRa0lIV0Fmdk9rUlVsZ3hnNXZ3K3lEVlk',
      stock: 30
    },
      {
      id: 4,
      title: 'Macbook Pro',
      price: 2000,
      image: 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/mbp-og-202510?wid=1200&hei=630&fmt=jpeg&qlt=90&.v=1758663225828',
      stock: 40
    }
     ]);
}
