import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import ProductsDataGrid from '../../ui/ProductsDataGrid/ProductsDataGrid';

function ProductsPage() {
  return (
    <>
      <Typography component="h1" variant="h4">Все препараты</Typography>
      
      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href="/">Сайт</Link>

        <Link underline="hover" color="inherit">Админ панель</Link>

        <Typography color="text.primary">Препараты</Typography>
      </Breadcrumbs>

      <ProductsDataGrid />
    </>
  );
}

export default ProductsPage;
