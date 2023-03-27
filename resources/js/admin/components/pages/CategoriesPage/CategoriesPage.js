import { Breadcrumbs, Link, Typography } from '@mui/material';
import React from 'react'
import CategoriesDataGrid from '../../ui/CategoriesDataGrid/CategoriesDataGrid';

function CategoriesPage() {
  return (
    <>
      <Typography component="h1" variant="h4">Все направлении</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href="/">Сайт</Link>

        <Link underline="hover" color="inherit">Админ панель</Link>

        <Typography color="text.primary">Препараты</Typography>
      </Breadcrumbs>

      <CategoriesDataGrid />
    </>
  );
}

export default CategoriesPage;
