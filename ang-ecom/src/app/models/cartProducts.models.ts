import { Product } from './products.moldels';  

export interface CartProducts extends Product{
    quantity: number;
}