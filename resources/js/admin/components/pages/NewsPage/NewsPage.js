import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import NewsDataGrid from '../../ui/NewsDataGrid/NewsDataGrid';

function NewsPage() {
  return (
    <>
      <Typography component="h1" variant="h4">Все турниры</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href="/">Сайт</Link>

        <Link underline="hover" color="inherit">Админ панель</Link>

        <Typography color="text.primary">Новости</Typography>
      </Breadcrumbs>

      <NewsDataGrid />
    </>
  );
}

export default NewsPage;
