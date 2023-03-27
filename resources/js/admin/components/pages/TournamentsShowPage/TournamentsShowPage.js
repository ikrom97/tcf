import { Breadcrumbs, Typography } from '@mui/material';
import Link from '@mui/material/Link';
import axios from 'axios';
import { useEffect, useState } from 'react';
import { generatePath, useParams } from 'react-router';
import { AdminRoute, APIRoute } from '../../../const';
import TournamentForm from '../../ui/TournamentForm/TournamentForm';

function TournamentsShowPage() {
  const params = useParams();
  const [tournament, setTournament] = useState(null);

  useEffect(() => {
    +params.id &&
      axios.get(generatePath(APIRoute.TOURNAMENTS_SINGLE, { id: params.id }))
        .then(({ data }) => setTournament(data))
        .catch((error) => console.log(error));
  }, [params]);

  return (
    <>
      <Typography component="h1" variant="h4">Все турниры</Typography>

      <Breadcrumbs aria-label="breadcrumb">
        <Link underline="hover" color="inherit" href="/">Сайт</Link>

        <Link underline="hover" color="inherit">Админ панель</Link>

        <Link underline="hover" color="inherit" href={AdminRoute.TOURNAMENTS}>Турниры</Link>

        <Typography color="text.primary">{tournament ? tournament.title : 'Добавление'}</Typography>
      </Breadcrumbs>

      {tournament && <TournamentForm tournament={tournament} />}
      {!tournament && <TournamentForm />}
    </>
  );
}

export default TournamentsShowPage;
