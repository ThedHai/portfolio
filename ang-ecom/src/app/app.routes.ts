import { Routes } from '@angular/router';
import { ProductList } from './pages/product-list/product-list';
import { Cart } from './pages/cart/cart';
import { AccountButton } from './components/account-button/account-button';
import { Account } from './pages/account/account';

export const routes: Routes = [
    { 
        path: '', 
        pathMatch: 'full',
        component: ProductList
     },
     {
        path: 'cart',
        component: Cart        
    },
    {
        path: 'account-button',
        component: AccountButton        
    },
    {
        path: 'account',
        component: Account      
    }
    

];
