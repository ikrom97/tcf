import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { generatePath, useParams } from 'react-router-dom';
import Form from '../../ui/form/form';
import { ApiRoute, AppRoute } from '../../../const';
import { toast } from 'react-toastify';

function TournamentsEdit() {
  const [tournament, setTournament] = useState(null);
  const params = useParams();

  useEffect(() => {
    axios.get(generatePath(ApiRoute.Tournaments['show'], { id: params.id }))
      .then(({ data }) => setTournament(data))
      .catch((error) => console.log(error));
  }, []);

  const handleFormSubmit = (evt) => {
    evt.preventDefault();

    axios.post(
      generatePath(ApiRoute.Tournaments['update'], { id: tournament.id }),
      new FormData(evt.target)
    )
      .then(() => toast.success('Турнир успешно сохранен'))
      .catch((error) => console.log(error));
  };

  return (
    <>
      <Typography component="h1" variant="h5">Турниры</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href={AppRoute.Index}>Сайт</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Admin}>Админ панель</Link>

        <Link underline="hover" color="inherit" href={AppRoute.Tournaments['index']}>Турниры</Link>

        <Typography color="text.primary">Редактировать</Typography>
      </Breadcrumbs>

      {tournament && <Form onSubmit={handleFormSubmit} data={tournament} />}
    </>
  );
}

export default TournamentsEdit;
