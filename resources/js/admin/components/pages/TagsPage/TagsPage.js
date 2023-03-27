import { Breadcrumbs, Link, Typography } from '@mui/material';
import React from 'react'
import TagsDataGrid from '../../ui/TagsDataGrid/TagsDataGrid';

function TagsPage() {
  return (
    <>
      <Typography component="h1" variant="h4">Все теги</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href="/">Сайт</Link>

        <Link underline="hover" color="inherit">Админ панель</Link>

        <Typography color="text.primary">Препараты</Typography>
      </Breadcrumbs>

      <TagsDataGrid />
    </>
  );
}

export default TagsPage;
