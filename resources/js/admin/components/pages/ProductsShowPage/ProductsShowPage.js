import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { generatePath, useParams } from 'react-router';
import { AdminRoute, APIRoute } from '../../../const';
import ProductForm from '../../ui/ProductForm/ProductForm';

function ProductsShowPage() {
  const params = useParams();
  const [product, setProduct] = useState(null);

  useEffect(() => {
    +params.id &&
      axios.get(generatePath(APIRoute.PRODUCTS_SHOW, { id: params.id }))
        .then(({ data }) => setProduct(data))
        .catch((error) => console.log(error));
  }, [params]);

  return (
    <>
      <Typography component="h1" variant="h4">Все препараты</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href="/">Сайт</Link>

        <Link underline="hover" color="inherit">Админ панель</Link>

        <Link underline="hover" color="inherit" href={AdminRoute.PRODUCTS}>Препараты</Link>

        <Typography color="text.primary">{product ? product.title : 'Добавление'}</Typography>
      </Breadcrumbs>

      {product && <ProductForm product={product} />}
      {!product && <ProductForm />}
    </>
  );
}

export default ProductsShowPage;
