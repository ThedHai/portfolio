import { Component, signal } from '@angular/core';
import { Product } from '../../models/products.moldels';
import { ProductCard } from "./product-card/product-card";
import { CartProducts } from '../../models/cartProducts.models';

@Component({
  selector: 'app-product-list',
  imports: [ProductCard],
  template: `
    <body class="bg-gray-100">
      <div class="p-8 grid grid-cols-4 gap-1">
        @for (prod of products(); track prod.id) {
          <app-product-card [product]="prod"/>
        }
      </div>
    </body>
  `,
  styles: ``,
})
export class ProductList {

  

    products = signal<CartProducts[]>([ 
    {
    "id": 1,
    "title": "iPad Air (5th Gen)",
    "price": 700,
    "image": "https://www.shutterstock.com/image-photo/varna-bulgaria-february-02-2014-600nw-255862375.jpg",
    "stock": 100,
    "quantity": 0,
    "code": "IPAD-AIR-G5"
  },
  {
    "id": 2,
    "title": "iPhone 17 Pro Max",
    "price": 1300,
    "image": "https://www.visible.com/shop/assets/images/shop/iPhone_17_Pro_Max_COS_1.jpg",
    "stock": 0,
    "quantity": 0,
    "code": "IPH-17-PMAX"
  },
  {
    "id": 3,
    "title": "MacBook Air M3 (13-inch)",
    "price": 1500,
    "image": "https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/mba13-skyblue-select-202503?wid=892&hei=820&fmt=jpeg&qlt=90&.v=M2RyY09CWXlTQUp1KzEveHR6VXNxcTQ1bzN1SitYTU83Mm9wbk1xa1lWN2h4SGtCQ2R3aStVaDRhL2VUV1NjdkJkRlpCNVhYU3AwTldRQldlSnpRa0lIV0Fmdk9rUlVsZ3hnNXZ3K3lEVlk",
    "stock": 1,
    "quantity": 0,
    "code": "MBA-M3-13"
  },
  {
    "id": 4,
    "title": "MacBook Pro M3 (16-inch)",
    "price": 2000,
    image: 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/mbp-og-202510?wid=1200&hei=630&fmt=jpeg&qlt=90&.v=1758663225828',
    "stock": 40,
    "quantity": 4,
    "code": "MBP-M3-16"
  },
  {
    "id": 5,
    "title": "Apple Watch Ultra 2 (Titanium)",
    "price": 799,
    "image": 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/MGHN4ref_VW_34FR+watch-case-49-titanium-natural-ultra3_VW_34FR+watch-face-49-milanese-ultra3_VW_34FR_GEO_US?wid=5120&hei=3280&bgc=fafafa&trim=1&fmt=p-jpg&qlt=80&.v=djJHVXQrZ2g4MFFiaXp4WW1xU1BUbmpDV2hhem5qNnpDenFtKzI1OXdzYkpncG05NXptdno5VmVNOFY1RGFaTGY4aHdOQjBiNSszby9Kd0FnejRCcGdnM2swYzVsWGtwUkFKeGltK0RJcHU2djRHWTExdkZHN3BxVGVRdTk2ME15TVUvb0UwM0NyWXQ0RDVqcFVTenBFUVN3R3VxZWhYYXgwOHljYmZFMXBocmMyRTN3NCt6QkoxaUdRb0FBay9VYktGTHdENW9lYUFnak5pcy9ReEdDUnN1eXN6TXc5R1V5WUNuS1o2dG13Zis2ZWNuaTlzVXhVWTZUS3dMZzF6SA',
    "stock": 25,
    "quantity": 0,
    "code": "AW-ULTRA-2"
  },
  {
    "id": 6,
    "title": "AirPods Pro 2 (USB-C)",
    "price": 249,
    "image": "https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/airpods-pro-2-hero-select-202409?wid=600&hei=600&fmt=jpeg&qlt=90&.v=1724883714875",
    "stock": 80,
    "quantity": 8,
    "code": "AIRPODS-P2-C"
  },
  {
    "id": 7,
    "title": "Apple Vision Pro (Spatial Computer)",
    "price": 3499,
    "image": 'data:image/webp;base64,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',
    "stock": 5,
    "quantity": 0,
    "code": "VISION-PRO"
  },
  {
    "id": 8,
    "title": "Magic Keyboard (Full Size)",
    "price": 99,
    "image": "https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/MK2A3?wid=600&hei=600&fmt=jpeg&qlt=95&.v=1626467755000",
    "stock": 50,
    "quantity": 0,
    "code": "ACC-KEY-MAGIC"
  },
  {
    "id": 9,
    "title": "Magic Mouse (Black and Silver)",
    "price": 79,
    "image": "https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/MMMQ3?wid=600&hei=600&fmt=jpeg&qlt=95&.v=1633027804000",
    "stock": 60,
    "quantity": 0,
    "code": "ACC-MOUSE-MAGIC"
  },
  {
    "id": 10,
    "title": "Apple TV 4K (3rd Gen)",
    "price": 129,
    "image": "https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/apple-tv-4k-hero-select-202210?wid=600&hei=600&fmt=jpeg&qlt=90&.v=1664896361408",
    "stock": 100,
    "quantity": 0,
    "code": "APL-TV-4K-G3"
  }
  ]);
}
