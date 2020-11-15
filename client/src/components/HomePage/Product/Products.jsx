import React, { useEffect, useState } from 'react';
import axios from 'axios';

import ProductCard from './ProductCard';
//import { data } from '../../../data/data.js';

const Product = () => {
  const [products, setProducts] = useState([]);

  useEffect(() => {
    async function data() {
      const data = await axios.get('http://localhost:8000/machines');
      setProducts(data.data);
      console.log(data.data);
    }
    return data();
  }, []);

  return (
    <>
      {products.length > 0 ? (
        products.map((el) => (
          <ProductCard
            key={el.id}
            image={el.images[0].url}
            brand={el.brand}
            price={el.price}
            id={el.id}
          />
        ))
      ) : (
        <p>Loading</p>
      )}
    </>
  );
};

export default Product;
