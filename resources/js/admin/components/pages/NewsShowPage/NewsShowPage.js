import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { generatePath, useParams } from 'react-router';
import { AdminRoute, APIRoute } from '../../../const';
import NewsForm from '../../ui/NewsForm/NewsForm';

function NewsShowPage() {
  const params = useParams();
  const [news, setNews] = useState(null);

  useEffect(() => {
    +params.id &&
      axios.get(generatePath(APIRoute.NEWS_SINGLE, { id: params.id }))
        .then(({ data }) => setNews(data))
        .catch((error) => console.log(error));
  }, [params]);

  return (
    <>
      <Typography component="h1" variant="h4">Все турниры</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href="/">Сайт</Link>

        <Link underline="hover" color="inherit">Админ панель</Link>

        <Link underline="hover" color="inherit" href={AdminRoute.NEWS}>Новости</Link>

        <Typography color="text.primary">{news ? news.title : 'Добавление'}</Typography>
      </Breadcrumbs>

      {news && <NewsForm news={news} />}
      {!news && <NewsForm />}
    </>
  );
}

export default NewsShowPage;
