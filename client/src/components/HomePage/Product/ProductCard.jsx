import React from 'react';
import { Card, CardImg, CardText, CardBody, CardTitle } from 'reactstrap';
import { Link } from 'react-router-dom';

const ProductCard = ({ image, brand, price, id }) => {
  return (
    <div>
      <Card>
        <CardImg
          top
          width='300px'
          height='300px'
          src={image}
          alt='Machine Photo'
          style={{ objectFit: 'none' }}
        />
        <CardBody>
          <CardTitle tag='h5'>{brand}</CardTitle>
          <CardText>Price: ${price}</CardText>
          <Link to={`/product/${id}`} className='btn btn-secondary'>
            Details..
          </Link>
        </CardBody>
      </Card>
    </div>
  );
};

export default ProductCard;
